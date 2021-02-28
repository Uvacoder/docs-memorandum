---
title: Introduction
description: ''
position: 1
category: 'Flutter'
---

## Welcome

Flutter is a framework to develop applications for smartphones (Android & iOS). It's can be complicated to install it because you need to install Flutter but Android Studio is very useful too, so it's a guide about installation. Here you can find some guide to use Flutter, check installation in **Operating systems** category to install Flutter.

---

## Code Organization

<alert type="info"> Links

- Original article: [**medium.com/flutter-community/flutter-code-organization-revised**](https://medium.com/flutter-community/flutter-code-organization-revised-b09ad5cef7f6) by **Conner Aldrich** (from Dec 15, 2019)
- [**github.com/ConProgramming/flutter-example**](https://github.com/ConProgramming/flutter-example) : GitHub example

</alert>

<citation title="Flutter: Code Organization (Revised)" author="Conner Aldrich" link="https://medium.com/flutter-community/flutter-code-organization-revised-b09ad5cef7f6" excerpt="As I wrote in the first version of my article, my biggest problem when getting into Flutter development was figuring out how to manage my code..." spoiler>

As I wrote in the first version of my article, my biggest problem when getting into Flutter development was figuring out how to manage my code. Native Android development splits UI code and Logic code between XML files and Java (or Kotlin) files respectively, but with Flutter it can all become a jumbled mess if you’re not careful. After working with Flutter for almost two years, this has been written as a simple guide to architecture your app in the best way possible for future refactoring and readability.

## The main.dart

The foundation of any Flutter app, the main.dart file, should hold very little code and only serve as an overview to an app.

```dart[main.dart]
import 'package:flutter/material.dart';
import 'package:example/theme/style.dart';
import 'package:example/routes.dart';
import 'package:example/bloc/bloc-prov-tree.dart';
import 'package:example/bloc/bloc-prov.dart';
import 'package:example/blocs/blocs.dart';
import 'blocs/blocs.dart';

void main() {
  runApp(ExampleApp());
}
class ExampleApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return BlocProviderTree(
      blocProviders: <BlocProvider>[
        BlocProvider<AuthBloc>(bloc: AuthBloc()),
        BlocProvider<PrefBloc>(bloc: PrefBloc()),
      ],
      child: MaterialApp(
        title: 'ExampleApp',
        theme: appTheme(),
        initialRoute: '/',
        routes: routes,
      ),
    );
  }
}
```

The widget being run by the runApp function should be a StatelessWidget, and the widget itself should be no more complicated than a simple MaterialApp/CupertinoApp/WidgetsApp wrapped in a BlocProviderTree.

The MaterialApp itself should have no heavy code in it, instead importing the theme, routes, etc. from other files.

## The routes.dart

To further simplify the main.dart file, a separate routes.dart file should exist which only holds the Map<String, WidgetBuilder> as a simple map of all of the app’s routes.

```dart[routes.dart]
import 'package:flutter/widgets.dart';
import 'package:example/screens/example1/examplescreen1.dart';
import 'package:example/screens/example2/examplescreen2.dart';

final Map<String, WidgetBuilder> routes = <String, WidgetBuilder>{
  "/": (BuildContext context) => ExScreen1(),
  "/ExScreen2": (BuildContext context) => ExScreen2(),
};
```

## Sub Folders

- The **theme folder** just contains a style.dart with the app theme which is accessed in the main.dart file
- The **services folder** holds some web APIs and native interaction code
- The **components folder** has custom widgets which are used by multiple different screens
- The **models folder** contains files each with a custom class of an object widely used throughout the app
- The **bloc folder** holds an abstract class in bloc.dart as well as bloc-prov.dart and a bloc-prov-tree.dart both of which are based off of code found [here](https://github.com/felangel/bloc)
- The **blocs folder** is pretty straightforward, holding multiple general bloc files (all of which extend the abstract Bloc class mentioned above) and a blocs.dart which acts as a single file exporting all the folder’s blocs (I used this video to learn how to structure the bloc files).
- The **screens folder** holds many different folders, each of which corresponds to a different screen of the app. Each screen folder holds three things: a primary screen file which serves to organize each component, a BLoC file that is only used for that screen, and a “components” folder that holds each component file used by the screen. Any section of a screen more complicated then a few widgets should be its own component, and some very complex components may even require their own BLoC file and components as a screen does.

## More Reading

After working with the first system of code organization I designed, I came up with this organization which works better for both large and small apps. I will be using this new architecture for all of my future apps, and I suggest for you to do so as well. An example can be found here.

Also, if you want this setup to be your default, you can learn how to make it or something else your default app template [here](https://medium.com/flutter-community/flutter-changing-the-default-app-template-f3448386139f).

</citation>

---

## WIP

Links about Flutter

- [**Install Flutter on Linux**](https://flutter.dev/docs/get-started/install/linux)
- [**Android Studio**](https://developer.android.com/studio)
- <https://doc.ubuntu-fr.org/android_sdk>
- <https://developer.android.com/studio/run/emulator-acceleration?utm_source=android-studio#vm-linux>
- <https://stackoverflow.com/questions/50652071/flutter-command-not-found>
- [**flutter.dev/docs/resources/architectural-overview**](https://flutter.dev/docs/resources/architectural-overview)
- <https://medium.com/@dev.n/the-complete-flutter-series-article-3-lists-and-grids-in-flutter-b20d1a393e39>
- <https://medium.com/@suragch/a-complete-guide-to-flutters-listtile-597a20a3d449>
- <https://medium.com/flutter-community/12-useful-libraries-to-support-development-using-flutter-3b8df97d898>
- <https://pub.dev/packages/local_auth> : auth with fingerprint
- <https://pub.dev/packages/bottom_navy_bar>
- [**github.com/Solido/awesome-flutter**](https://github.com/Solido/awesome-flutter)
- <https://bloclibrary.dev>
- <https://flutter.dev/docs/deployment/android>
- <https://fluttercentral.com/Articles/Post/1145/ListView_with_Images_from_the_Internet>
- <https://blog.usejournal.com/flutter-search-in-listview-1ffa40956685>
