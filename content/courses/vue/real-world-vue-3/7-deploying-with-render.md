---
title: Deploying with Render
description: 'How to smoothly deploy our app with a convenient platform'
position: 7
---

At this point, our example app has all of the features we need it to for this course. We’ve covered a lot of concepts along the way and unpacked fundamental Vue app development practices. We’re now ready to take our project to the next step of any real-world application and deploy it out into the real world. In this lesson, we’ll understand what happens in the build process and how to smoothly deploy our app with a convenient platform called [Render](https://render.com/).

---

## What happens when we build our app?

Before we deploy our Vue app, it has to first be _built_. If this concept is new to you, I’m referring to the process of compiling all of our code into a state that is ready to release onto the Internet for people to use.

Remember earlier in the course, when we learned how the **index.html** file is the “single page” of our single page application? We looked at how our App is being loaded into the `div` with the id of `"app"` in this file:

**📁public/index.html**

```html
<div id="app"></div>
<!-- built files will be auto injected -->
```

Did you notice that below that `div`, there’s a comment telling us that when we build our app, the finished, deployable, _built_ files will end up here? We can get a better grasp of what this looks like by running through the build process.

---

If we peek into our project’s **package.json** file, we’ll see these Vue CLI scripts available to us.

📄 **package.json**

```javascript
"scripts": {
"serve": "vue-cli-service serve",
"build": "vue-cli-service build",
"lint": "vue-cli-service lint"
}
```

We’re already familiar with running the `serve` command in order to spin up our project on a local host. We’ve been using it throughout this course as we’ve developed the application code. Since we’re ready to take our project into the real world, we can move on to using the `build` command, which of course _builds_ our project into a usable product that can be deployed. Let’s see what happens when we type the command `npm run build` in our terminal (while cd’d within the root of the project).

**Terminal**

```wasm
$ npm run build

⠏ Building for production...

DONE Compiled successfully in 9317ms 4:19:32 PM

File Size Gzipped

dist/js/chunk-vendors.3002c4a1.js 141.24 KiB 50.80 KiB
dist/js/app.f2213f62.js 5.08 KiB 1.98 KiB
dist/css/app.d5e424b2.css 0.61 KiB 0.38 KiB

Images and other types of assets omitted.

DONE Build complete. The dist directory is ready to be deployed.
```

As we see, our app was compiled successfully and output into a new **dist** directory. This directory contains the production-ready code that we will deploy.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F1.1608049790199.jpg?alt=media&token=c81b9fb2-cb55-46a2-a77e-77d4a7bf8ead](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F1.1608049790199.jpg?alt=media&token=c81b9fb2-cb55-46a2-a77e-77d4a7bf8ead)

Taking a look inside this new **dist** directory, we’ll see a folder for our CSS code, another one full of our now-bundled JS code, and an **index.html** file. Sure enough, when we look inside that new, production-ready **index.html**, we see that our built files have been auto-injected, just like that comment promised.

📄 **dist/index.html**

```html
<div id=app></div>
<script src=/js/chunk-vendors.3002c4a1.js></script>
<script src=/js/app.f2213f62.js></script>
```

Now that we understand what this build process looks like, how do we actually go about deploying this code into production?

---

## A high-stakes headache

When talking about deployment, we’re actually talking about a rather complex and nuanced process.

To do it right, you’d need to:

1. Find a web hosting service responsible for serving your app
2. Hook up a custom domain for your site
3. Get SSL - https certificates to ensure you have a secure domain
4. Build the site locally, and drop those files into the server
5. Ensure everything is being served correctly

Once your app is deployed, there are additional concerns around maintaining it and continuing to deploy new and improved versions of it in a stable way, and ensuring you can roll back to earlier versions in an emergency. This can all be quite a pain. If you aren’t confident about what you’re doing, it’s a pretty high-stakes risk to take all of this on solo.

Fortunately, there are platforms that do a lot of the heavy lifting of deployment (and re-deployment) for us. Which brings me to our solution of choice, which we’ll be learning about in this lesson: Render.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F2.1608049795979.jpg?alt=media&token=b829fea8-8cc7-4eff-a2f1-5c0060e0a4cf](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F2.1608049795979.jpg?alt=media&token=b829fea8-8cc7-4eff-a2f1-5c0060e0a4cf)

---

## Render to the Rescue

Render provides instant deploys for your apps. You simply connect it up to your project’s repo, and it automatically builds and deploys your app onto a live site that users can see and interact with. It can also perform automatic updates for you so that whenever you push to your repo, Render automatically rebuilds and deploys your site with no additional work on your end.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F3.1608050122107.jpg?alt=media&token=5a7d7a03-a242-43c2-bc44-b2c1dec899fd](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F3.1608050122107.jpg?alt=media&token=5a7d7a03-a242-43c2-bc44-b2c1dec899fd)

In order to get started using it to deploy our Vue app, we’ll just [create a free account](https://render.com/).

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F4.1608050141297.jpg?alt=media&token=85edd247-b88d-4339-a2fe-0396832eb9a5](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F4.1608050141297.jpg?alt=media&token=85edd247-b88d-4339-a2fe-0396832eb9a5)

You’ll be emailed a verification link, which you’ll click to enter into your new account. Once you’re in, you’ll see that there are a number of services available within Render. We’re going to start off by clicking the blue **New +** button, which reveals a dropdown with some options.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F5.1608049818394.jpg?alt=media&token=3e10cc37-229f-4493-b20c-5627df996f14](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F5.1608049818394.jpg?alt=media&token=3e10cc37-229f-4493-b20c-5627df996f14)

As you can see, we’re able to deploy a Static Site served over a global CDN with the ability to add a custom domain, plus SSL out of the box. If you’re not familiar, SSL (Secure Sockets Layer) is a protocol for web browsers and servers that allows for the authentication, encryption, and decryption of data sent over the Internet. In other words: it’s a built-in security measure that comes free with Render.

We’ll select this **Static Site** option to deploy our Vue app with Render, which prompts us to select a repo for the site that we want to deploy. Since we haven’t yet connected any repos to our Render account, we’ll click on the “Github” link to do so. If you’re not already logged into Github, you’ll sign in to install Render within your Github account and select the repo you’d like to connect.

❗**IMPORTANT:** In order to follow along with these steps, you’ll need to _fork_ the Vue Mastery course repo to your personal Github account. That way, you’ll be able to connect the forked repo at this step.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F6.1608050160184.jpg?alt=media&token=ab53f22d-2e2d-40b1-8182-2bb64884fc22](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F6.1608050160184.jpg?alt=media&token=ab53f22d-2e2d-40b1-8182-2bb64884fc22)

Upon clicking **install**, you’ll be redirected back to Render, where you should now see that newly connected repo showing up.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F7.1608049833719.jpg?alt=media&token=3de82aa6-25ea-4faf-9e6b-c7655477e49d](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F7.1608049833719.jpg?alt=media&token=3de82aa6-25ea-4faf-9e6b-c7655477e49d)

Now we’re ready to select that repo and deploy it as a static site, which is a very straightforward process. As the page intelligently says: “You seem to be using Vue.js, so we’ve autofilled some fields accordingly.”

We’ll give our state site a **Name**; I’m calling it “Real World Vue 3”.

As for the **Branch**, this is where you’d typically select **Master** (which is the default selection) since most apps deploy the Master branch of their repo. However, in our case, since I’ve been building the app incrementally with each new lesson ending with its own ending branch, we’re going to select **L6-end** since this includes the final code for our entire example app.

We can leave the autofilled **Build Command** unchanged, as well as the name of the directory to publish to: **dist** (look familiar?).

There are additional **Advanced** options as well, including the ability to **Add Environment Variables** and/or a **Secret File**, but we’ll skip those for now.

I do want to bring your attention to the **Auto Deploy** field, though, which is set to “Yes” by default. This means our app will be automatically redeployed whenever a change is pushed to this branch, which is a pretty awesome feature. If we wanted to handle this manually, we’d toggle this to “No” and we could instead trigger a manual deploy with the button of the same name.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F8.1608050183045.jpg?alt=media&token=fbafd2a8-12f8-4393-b5c4-d091d90b16f0](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F8.1608050183045.jpg?alt=media&token=fbafd2a8-12f8-4393-b5c4-d091d90b16f0)

Now we’re ready to hit the **Create Static Site** button and watch Render bake our site into a delicious live site. 🥧

---

## Adjusting for History Mode

We can now click on the link Render created for our site, which in my case is [https://real-world-vue-3.onrender.com](https://real-world-vue-3.onrender.com), to view our app live!

As we click around, it looks like it’s working. But watch what happens when we open a new tab and try going to a specific page, like: [https://real-world-vue-3.onrender.com/event/123](https://real-world-vue-3.onrender.com/event/123)

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F9.1608049844886.jpg?alt=media&token=90cd89d2-7775-4810-924c-4e86bbe710d5](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F9.1608049844886.jpg?alt=media&token=90cd89d2-7775-4810-924c-4e86bbe710d5)

Uh oh… we’re getting a “Not Found” message, and there’s this 404 error in the console. Why is this happening?

In the [Vue Router Essentials](https://www.vuemastery.com/courses/real-world-vue3/vue-router-essentials) lesson, I briefly mentioned how our router is using [history mode](https://router.vuejs.org/guide/essentials/history-mode.html) because we selected that option when we created our project from the Vue CLI. Well that just became very relevant.

**📁src/router/index.js**

```javascript
const router = createRouter({
history: createWebHistory(process.env.BASE_URL),
routes
})
```

In history mode, our app is taking advantage of the browser’s [history.pushState API](https://developer.mozilla.org/en-US/docs/Web/API/History/pushState) to change the URL without reloading the page.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F10.1608050201860.jpg?alt=media&token=e4165b7d-f18c-4031-a58b-ccdad9225ba5](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F10.1608050201860.jpg?alt=media&token=e4165b7d-f18c-4031-a58b-ccdad9225ba5)

The problem we’re currently running into is the fact that our app is a single page app, which means everything needs to be served from **index.html**. While our development server was configured to work this way for us, we need to configure Render’s rules so that it knows to always serve up **index.html**, no matter what url we navigate to.

We can do this very simply within the **Redirect / Rewrite** tab of our static site’s dashboard:

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F11.1608049857552.jpg?alt=media&token=6cd3f6b6-e897-4270-a605-0ff767e98b2a](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F11.1608049857552.jpg?alt=media&token=6cd3f6b6-e897-4270-a605-0ff767e98b2a)

We’ll add a catchall of `/*` and tell it to always _Rewrite_ to `/index.html` Now, no matter what url we request, it will be served from **index.html**. Problem solved.

By the way… 🤔 If you’re wondering why everything seemed to work fine initially, before I pasted that url into a new tab and everything broke, that’s because when we first visited our new site, we visited the root route (’/’) which inherently served up **index.html**, and history mode took over from there.

With that catchall implemented, we’ve now solved our issue and successfully deployed our site. Before we end, let’s tour Render a bit more to understand what else is possible.

---

## Touring Render

We already looked at the **Redirects / Rewrites** tab, but there are other tabs here that are just as useful, such as **Events**, which shows a history of deploys that have been made. This is where we can perform a rollback to a previous build if necessary.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F12.1608050225404.jpg?alt=media&token=24ee1877-062f-45a2-b8d9-4384852c7e17](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F12.1608050225404.jpg?alt=media&token=24ee1877-062f-45a2-b8d9-4384852c7e17)

Under the **Pull Request** tab, you can enable pull requests and Render will automatically create a new instance of your site any time a pull request is created on your deployed branch. With its own URL, it can be used to review code before merging and will be deleted automatically when the PR is closed. This makes testing and collaboration easier.

Speaking of collaboration, you can also create and work within **teams** on Render, which an individual account holder can create from their dropdown here:

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F13.1608050247646.jpg?alt=media&token=77eab61a-1198-4b23-a9a8-42d1ec71dd9d](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F13.1608050247646.jpg?alt=media&token=77eab61a-1198-4b23-a9a8-42d1ec71dd9d)

---

## Render scales with you

As your app scales, perhaps with a more robust backend or some server-side rendering, you can scale up your Render services, too—horizontally (add more instances of a service) or vertically (add more CPU and RAM to an instance)—with features including:

* Web services
* Managed PostgreSQL databases
* Cron jobs
* Private services
* Background workers

And you can choose from several environments:

* Docker
* Node
* Ruby
* Go
* Elixir
* Python
* Rust

---

## A Helpful Community Forum

If you ever get stuck while using Render, they also have a [community form](https://community.render.com/c/vue-mastery) that can help you get unstuck. In fact, they’ve even created a “Vue Mastery” category to address any issues you may run into while following this lesson.

---

## What’s next?

Now that we’ve finished coding our app and deployed it out into the wild, where do we go from here? There are many more features to add and concepts to unpack, and in our next lesson we’ll take a look at the different ways we can take this app to the next level. See you there!

---

---

_Please note that Vue Mastery is an affiliate of Render. As our subscribers choose to use their services, our work at Vue Mastery receives compensation, a percentage of which is given back to support the Vue.js framework._
