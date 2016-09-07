# Edinburgh Wordpress Template

Upcoming Wordpress theme for my blog.

**Please mind that this theme is currently under construction! It's not finished yet.** 

## Setup Development Environment

Install LiveReload Browser Plugin e.g. [Chrome Extension](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en). Don't forget to enable it.

Then

```
# clone git repo
$ npm install
$ gulp sass # compile sass file once
$ gulp # listen for changes, compile sass files and reload browser
```

Get a local Wordpress up and running. Symlink the project folder `theme` into your Wordpress installation
```
ln -s <project root>/theme <wordpress root>/wp-content/themes/edinburgh 
```

Enable the theme in the Wordpress backend.

### Contribution
Useful links for setting up the dev env:
- [Using Gulp for WordPress Automation](http://code.tutsplus.com/tutorials/using-gulp-for-wordpress-automation--cms-23081)
- [Setting Up Gulp With LiveReload, Sass, and Other Tasks](https://community.nitrous.io/tutorials/setting-up-gulp-with-livereload-sass-and-other-tasks)

# Installation
Compile SASS and copy the files to the theme folder of your Wordpress installation:
```
$ gulp sass
$ cp <project root>/theme <wordpress root>/wp-content/themes/edinburgh
```

- Next, go to the Wordpress backend
  - Appearance > Themes. Activate the Edinburgh theme
  - Recommended Widgets Configuration (Appearance > Customize):
    - "Before Comments Widget Areas": add Meks Smart Author here (no title, 80 avatar size, no "all posts" link)
    - "After Comments Widget Areas": add Recent Posts, Recent Comments, Categories here.
  - If you use the plugin `Simple Custom CSS`, please remove all custom styles (or deinstall plugin completely)
  - If necessary, reconnect to JetPack to enable Gravatar Hovercards (and notification checkbox in comment form?)
