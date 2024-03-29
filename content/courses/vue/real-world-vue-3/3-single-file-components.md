---
title: Single File Components
description: 'Customizing it to build our own app.'
position: 3
---

Now that we’ve created our project with the Vue CLI, we’re ready to start customizing it to build our own app.

---

If you’re coding along (which I encourage you to do) you’ll want to checkout the `L3-start` branch of our [project repo](https://github.com/Code-Pop/Real-World_Vue-3) to grab the starting code (L3 stands for Lesson 3). In that code, I want to bring your attention to this file I’ve added:

📄**prettierrc.js**

```json
module.exports = {
singleQuote: true,
semi: false
}
```

Here, I’ve set up some rules so that Prettier will change any double quotes (`"`) to single ones (`'`) and remove any semicolons (`;`). I’m not advocating for or against semicolons and double quotes. This is a simple example of how you might add some Prettier configuration rules to your project. We could do something similar for ESLint as well. For a more in-depth look at how you can configure ESLint + Prettier as well as get the most out of VS Code, you can check out [this article](https://www.vuemastery.com/blog/vs-code-for-vuejs-developers).

---

## What are these .vue files?

In order to start building our app, we need to get some foundational understanding of how things are working within the demo app the CLI created for us, including the **views** directory, which includes two single-file .vue files: **Home.vue** and **About.vue**

These are the components that Vue Router loads up when we navigate to the Home and About routes, respectively.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F1.1603236674017.jpg?alt=media&token=06705867-4d84-4788-b258-cbe40ba06d83](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F1.1603236674017.jpg?alt=media&token=06705867-4d84-4788-b258-cbe40ba06d83)

In the next lesson, we’ll explore the essentials of Vue Router, but for now you just need to understand that these “view” components are the different views that can be seen (or navigated to) within our app. They can contain child components that are nested within them, and their children will be displayed in that view as well. For example, the **Home.vue** component has a child: **HelloWorld.vue**, which has a bunch of template code that is being displayed when we’re on the Home route.

Each of these .vue files are single file components, and that’s what this lesson is exploring: How are single file components composed, and how do you use them to create a Vue app?

---

## Anatomy of a Single File Component

When we’re talking about Vue apps, we’re really talking about a collection of Vue components.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F2.opt.gif?alt=media&token=35fb74f3-a2b3-4fa6-9b8c-2eb5f2996bf2](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F2.opt.gif?alt=media&token=35fb74f3-a2b3-4fa6-9b8c-2eb5f2996bf2)

So what do these single file components look like under the hood?

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F3.1603236710061.jpg?alt=media&token=3e0795d2-8389-4eba-953a-164075a2df8b](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F3.1603236710061.jpg?alt=media&token=3e0795d2-8389-4eba-953a-164075a2df8b)

A typical .vue component has three sections: `<template>`, `<script>`, and `<style>`.

To use the analogy of a human body, you can think of the template as the skeleton of your component since it gives it structure, and the script section is the brains, providing the intelligence and behavior. The style section is exactly what it sounds like: the clothing, makeup, hairstyle, etc.

Traditionally, these sections are written in HTML, JavaScript and CSS. However, with the proper setup, you could also use alternatives such as Pug, TypeScript, and SCSS.

Now that we’re starting to understand single file components, we can start building our own. But first, _what_ are we building in this course, exactly?

---

## The app we’re building

By the end of this course, we will have built an app that display events.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F4.1603236747898.jpg?alt=media&token=788291e2-f592-4cb1-9be4-33c11cfb06f2](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F4.1603236747898.jpg?alt=media&token=788291e2-f592-4cb1-9be4-33c11cfb06f2)

The events will be pulled in from an external API call, and displayed on the Home page. We’ll be able to click on the event to see the event details.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F5.1603236747899.jpg?alt=media&token=f2069673-b843-4b88-b962-8010d6e30083](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F5.1603236747899.jpg?alt=media&token=f2069673-b843-4b88-b962-8010d6e30083)

---

## Our first Single File Component

To get started building our first component, we’ll simply delete out the code that is within the ` < template > `, ` < script > `, and ` < style > ` sections of **HelloWorld.vue**. While we’re at it, let’s rename this file to **EventCard.vue**, since it’s the card that displays info for each event.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F6.1603236765927.jpg?alt=media&token=157863f0-ade9-4a41-97e3-278fec456805](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F6.1603236765927.jpg?alt=media&token=157863f0-ade9-4a41-97e3-278fec456805)

**📁src/components/EventCard.vue**

```html
<template>
    <div class = "hello"></div> 
</template>

<script>
export default {
    name: 'EventCard'
    // props: {
    //  msg: String
    // }
}
</script>

<style scoped>
</style>
```

Now that this file is cleared out, we can add our own code to it. First, let’s add some styles. We’ll change the class name on the `div` in order to do that.

**📁src/components/EventCard.vue**

```html
<template>
    <div class="event-card">
    </div>
</template>

<script>
    export default {
        name: 'EventCard'
        // props: {
        //  msg: String
        // }
    }
</script>

<style scoped>
    .event-card {
        padding: 20px;
        width: 250px;
        cursor: pointer;
        border: 1px solid #39495c;
        margin-bottom: 18px;
    }

    .event-card:hover {
        transform: scale(1.01);
        box-shadow: 0 3px 12px 0 rgba(0, 0, 0, 0.2);
    }
</style>
```

Now the `div` has the proper styles, including a hover effect. If you’re wondering what that `scoped` attribute means, that allows us to _scope_ and isolate these styles to just this component. This way, these styles are specific to this component and won’t affect any other part of our application. You’ll see me using `scoped` styles throughout this course.

Since we want to display information about the event on this **EventCard**, we need to give it an event to display. So let’s add that in the `data` option of our `<script>` section.

**📁src/components/EventCard.vue**

```html
<script >
    export default {
        name: 'EventCard'
        // props: {
        //  msg: String
        // },
        data() {
            return {
                event: {
                    id: 5928101,
                    category: 'animal welfare',
                    title: 'Cat Adoption Day',
                    description: 'Find your new feline friend at this event.',
                    location: 'Meow Town',
                    date: 'January 28, 2022',
                    time: '12:00',
                    petsAllowed: true,
                    organizer: 'Kat Laydee'
                }
            }
        }
    }
</script>
```

Now, in the `<template>` we can display some of that `event` data with JavaScript expressions, like so:

**📁src/components/EventCard.vue**

```html
<template>
    <div class="event-card">
        <span>@{{ event.time }} on {{ event.date }}</span>
        <h4>{{ event.title }}</h4>
    </div>
</template>
```

That’s it for the component for now.

---

In order for this **EventCard** to be displayed, it needs to be put somewhere that can be routed to, such as the **Home.vue** file in our views directory. Just like with the **HelloWorld.vue** file, we’ll need to import **EventCard.vue**, register it as a child component, and then we can use it in the template.

**📁src/views/Home.vue**

```html
<template>
    <div class="home">
        <EventCard />
    </div>
</template>

<script>
    // @ is an alias to /src
    import EventCard from '@/components/EventCard.vue'

    export default {
        name: 'Home',
        components: {
            EventCard // register it as a child component
        }
    }
</script>
```

Now, we should be seeing our EventCard showing up in the browser when we’re on the Home view.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F7.1603236564766.jpg?alt=media&token=ccc406cc-9152-4b70-8d89-6492e4302f29](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F7.1603236564766.jpg?alt=media&token=ccc406cc-9152-4b70-8d89-6492e4302f29)

---

## Refactoring for a more production-ready use case

We’re making great progress, but remember we want the **EventCard** to be displaying in the middle of the Home page. And, since we’ll eventually have a collection of events that we pull in from an API call, we need to do a bit of refactoring to make this a more production-ready use case.

Our refactoring steps include:

* Move events data to parent (**Home.vue**)
* Parent creates **EventCard** component for each event in its data
* Parent feeds each **EventCard** its own event to display
* Parent displays **EventCard**s in a Flexbox container

Let’s get started with this refactor.

---

## Move events data to parent

Our first step is to delete out the `event` data from **EventCard.** We’ll then add an `event` prop instead, so that the parent can feed this component an event object to display. We’re then left with this code:

**📁src/components/EventCard.vue**

```html
<template>
    <div class="event-card">
        <span>@{{ event.time }} on {{ event.date }}</span>
        <h4>{{ event.title }}</h4>
    </div>
</template>

<script>
    export default {
        props: {
            event: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>
    .event-card {
        padding: 20px;
        width: 250px;
        cursor: pointer;
        border: 1px solid #39495c;
        margin-bottom: 18px;
    }

    .event-card:hover {
        transform: scale(1.01);
        box-shadow: 0 3px 12px 0 rgba(0, 0, 0, 0.2);
    }
</style>
```

Now that EventCard is set up to receive an event, we can add the `events` data to the parent, **Home.vue**.

**📁src/views/Home.vue**

```html
<template>
    <div class="home">
        <EventCard />
    </div>
</template>

<script>
    // @ is an alias to /src
    import EventCard from '@/components/EventCard.vue'

    export default {
        name: 'Home',
        components: {
            EventCard
        },
        data() {
            return {
                events: [{
                        id: 5928101,
                        category: 'animal welfare',
                        title: 'Cat Adoption Day',
                        description: 'Find your new feline friend at this event.',
                        location: 'Meow Town',
                        date: 'January 28, 2022',
                        time: '12:00',
                        petsAllowed: true,
                        organizer: 'Kat Laydee'
                    },
                    {
                        id: 4582797,
                        category: 'food',
                        title: 'Community Gardening',
                        description: 'Join us as we tend to the community edible plants.',
                        location: 'Flora City',
                        date: 'March 14, 2022',
                        time: '10:00',
                        petsAllowed: true,
                        organizer: 'Fern Pollin'
                    },
                    {
                        id: 8419988,
                        category: 'sustainability',
                        title: 'Beach Cleanup',
                        description: 'Help pick up trash along the shore.',
                        location: 'Playa Del Carmen',
                        date: 'July 22, 2022',
                        time: '11:00',
                        petsAllowed: false,
                        organizer: 'Carey Wales'
                    }
                ]
            }
        }
    }
</script>
```

---

## Parent creates **EventCard** components

Now that **Home.vue** has the `events` data, we can use that data to create a new **EventCard** for each of the event objects that are in that data, using the `v-for` directive.

**📁src/views/Home.vue**

```html
<template>
    <div class="home">
        <EventCard v-for="event in events" :key="event.id" :event="event" />
    </div>
</template>

<script>
    // @ is an alias to /src
    import EventCard from '@/components/EventCard.vue'

    export default {
        name: 'Home',
        components: {
            EventCard
        },
        data() {
            return {
                events: [{
                        id: 5928101,
                        category: 'animal welfare',
                        title: 'Cat Adoption Day',
                        description: 'Find your new feline friend at this event.',
                        location: 'Meow Town',
                        date: 'January 28, 2022',
                        time: '12:00',
                        petsAllowed: true,
                        organizer: 'Kat Laydee'
                    },
                    {
                        id: 4582797,
                        category: 'food',
                        title: 'Community Gardening',
                        description: 'Join us as we tend to the community edible plants.',
                        location: 'Flora City',
                        date: 'March 14, 2022',
                        time: '10:00',
                        petsAllowed: true,
                        organizer: 'Fern Pollin'
                    },
                    {
                        id: 8419988,
                        category: 'sustainability',
                        title: 'Beach Cleanup',
                        description: 'Help pick up trash along the shore.',
                        location: 'Playa Del Carmen',
                        date: 'July 22, 2022',
                        time: '11:00',
                        petsAllowed: false,
                        organizer: 'Carey Wales'
                    }
                ]
            }
        }
    }
</script>
```

Notice how we’re binding the event’s `id` to the `:key` attribute. This gives Vue.js a way to identify and can keep track of each unique **EventCard**.

---

## Parent feeds each **EventCard** its own event

Additionally, as we iterate over the `events` array to create a new **EventCard** for each event object, we’re passing in that `event` object into a new `:event` prop we’ve added to the **EventCard**. This way, each **EventCard** has all of the data it needs to display its own event info.

---

## Parent displays **EventCard**s in a Flexbox container

If we check this out in the browser, it’s working. We’ve created an EventCard for each of the `events` in **Home.vue**’s data.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F8.1603236569784.jpg?alt=media&token=8c2be353-bd9e-48bd-a3be-c070cb2b23a0](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F8.1603236569784.jpg?alt=media&token=8c2be353-bd9e-48bd-a3be-c070cb2b23a0)

Finally, we just need to put these events in a Flexbox container to get things looking how we want. Let’s head into the Home.vue file and change the class name of the `div` that our `EventCard` is nested within, and add some Flexbox styles.

**📁src/views/Home.vue**

```html
<template>
    <h1>Events For Good</h1>
    <div class="events">
        <EventCard v-for="event in events" :key="event.id" :event="event" />
    </div>
</template>

<script>
    ...
</script>

<style scoped>
    .events {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
```

Now, our **EventCard**s will be displayed within a center-aligned column.

---

## What about Global Styles?

So far, we’ve discussed scoped styles and how the `scoped` attribute allows us to add styles that target the specific component we’re concerned about. But what about global styles that we want applied to our entire app? While there are different ways to achieve this, the simplest way to get started with this is by heading into the **App.vue** file. Remember: this is the root component of our app.

Notice that there are some styles rules that the CLI set up for us in this component’s `<style>` section.

**📁src/App.vue**

```html
<template>... </template>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

#nav {
    padding: 30px;
}

#nav a {
    font-weight: bold;
    color: #2c3e50;
}

#nav a.router-link-exact-active {
    color: #42b983;
}
</style>
```

These are global styles that are applied to the entire app. Here, we could add a new rule. Like so:

**📁src/App.vue**

```html
<style>
    ... h4 {
        font-size: 20px;
    }
</style>
```

Now, any `h4` in our app will have a font-size of `20px`. Since our **EventCard**’s template has an `h4`, that element will receive this new global style.

**📁src/components/EventCard.vue**

```html
<div class="event-card">
    <span>@{{ event.time }} on {{ event.date }}</span>
    <h4>{{ event.title }}</h4>
</div>
```

Speaking of global items in our Vue app, what would happen if we added something like an `h1` to our **App.vue**’s template?

**📁src/App.vue**

```html
<template>
    <div id="app">
        <div id="nav">
            <router-link to="/">Home</router-link> |
            <router-link to="/about">About</router-link>
        </div>
        <h1>Events For Good</h1> <!-- new element -->
        <router-view />
    </div>
</template>
```

Let’s head into the browser and take a look.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F9.1603236579437.jpg?alt=media&token=bee1b2a3-982b-4300-a4e1-afcc6937dad0](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F9.1603236579437.jpg?alt=media&token=bee1b2a3-982b-4300-a4e1-afcc6937dad0)

We’re seeing a few things. First, our Flexbox container is working (✅) and the event titles are now just a bit bigger (`20px`) due to that new global `h4` style rule we added. And notice what happens when we navigate to the About route.

![https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F10.1603236586908.jpg?alt=media&token=6a22ff42-8d94-4216-9559-6eb85738bc09](https://firebasestorage.googleapis.com/v0/b/vue-mastery.appspot.com/o/flamelink%2Fmedia%2F10.1603236586908.jpg?alt=media&token=6a22ff42-8d94-4216-9559-6eb85738bc09)

We’re still seeing that `h1` displaying “Events For Good”. So this tells us that we can place content in our **App.vue**’s template that we want to be displayed globally across every view of our application. This could be useful for things like a search bar, header, or of course a nav bar like we already have here.

But for our use case, we don’t need that title showing up in every view, so we’ll place it into the **Home.vue** file.

**📁src/views/Home.vue**

```html
<template>
    <h1>Events For Good</h1>
    <div class="events">
        <EventCard v-for="event in events" :key="event.id" :event="event" />
    </div>
</template>
...
```

Now that title will only show up one the Home route.

---

## Let’s ReVue

We’ve covered a lot. We learned what a single file .vue component is, how it’s composed (with `scoped` versus global styles), and how to start using these .vue components to build up a Vue app. In the next lesson, we’re going to dive deeper into the essentials of Vue Router to better understand how to set up app navigation. See you there!
