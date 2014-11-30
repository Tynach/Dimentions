Dry Framework
=============

Don't Repeat Your
-----------------

### HTML
We shouldn't have to repeat ourselves when we write code. While programming languages have functions, structures, polymorphism, and other things to help with this, markup languages like HTML typically do not.

You might have a bit of HTML that holds your login form. Two text fields - such as 'username' and 'password' - with a 'submit' button to perform the login. However, while you might have this login form appear in the corner of every page, you might also have a 'Login Failed' page that has its own, larger login form.

On this page, you don't need to have the login form appear twice, nor would you want to store the HTML for the login form twice. You might, however, want to change how it's styled and where it appears in the HTML document.

What if we treated this login form as a function? We could then call it in the main HTML template of the site to appear in the corner of the page, but have this special login page call the function in the main body. The template for the login page could also link a CSS file that would style it properly.

### Programming Language
PHP has a lot of functionality. A lot of things that other frameworks do, PHP already does. However, PHP is largely written in C, while these frameworks are written in, well, PHP. This causes a significant amount of unnecessary overhead, all in the name of naming consistency.

Except that when you have naming consistency within one framework that is different than in another framework, you become inconsistent. The only consistency is the language underlying both. While PHP may not have the most consistently named set of functions, it will still be easier to memorize one set of function names instead of a new set for every framework.

For this reason, the Dry framework does as little as possible. It facilitates PHP, rather than running on top of it. It should be considered a stripped down 'hull' of a website built using raw PHP, rather than a complete project that tries to let you press a few buttons and have a website.

Dry is *not* a content management system, nor is it a one-size-fits-all solution. It has no features that let you manage the content or database of your website, though handling database connections is a planned part of the framework. It can be thought of as a sort of, "One Size Fits None," solution - after all, it's practically unusable for anything out of the box.

But it *does* gives you the tools to make building your own system just a bit easier.


Why I Built Dry
---------------

Quite honestly, because I had a certain picture for how I would handle my HTML and other bits of a website, and I also am *extremely* picky about how my HTML output is indented. I wasn't happy with other frameworks in one way or another, so I decided to build my own.

The first result of this was... Terrible. I rewrote it after not getting very far, and created my old 'Unite' project. However, I had only just began to learn about proper Object Oriented Programming, and I started to realize that 'Unite' wasn't much better than my original project.

Dry is a rewrite of Unite, with a better name and better codebase. I also have been trying to properly document the code from the start, and I've been trying to write and organize it as if it were going to eventually be maintained by someone else. I don't have any professional experience, so I may still not be doing a very good job, but that is at least what I've been *trying* to do.

I also didn't particularly care about the way everyone seems to be comparing the 'performance differences' of different frameworks. Why should there be any? Why can't a web page run as little code as possible, and mostly just run on the raw language, instead of having languages built on the main language that parse more languages, and so on; or just as bad, including tons of files and tons of code that's not even used for the majority of pages?


Using Dry
---------

The majority of files can be held anywhere you'd like on your computer. If multiple websites or projects use some of the same 'modules', for example, you can hold your 'Modules' folder in a location separate from either project. However, each project would need to have its own '`locations.php`' file.

Many, probably all, of the files in the root directory should be together in one folder, with one copy of all of them per project. Thus if you have 5 projects hosted on the same machine, you should have 5 copies of all of them. Certain ones that just exist as 'libraries' can potentially be held separately, but you'd have to change all instances of those files being included.

Your web server should be set to serve the 'Http' folder as the website's root directory. This is where your `index.php` will be located, as well as any other pages on the website.

Your PHP files will need to include the `include.php` file held in the root directory (of the project, not what the web server is set to); after that, you'll be able to use functions such as '`requireOnceRoot()`'.

Alternatively, you can do what I did in the sample project and include a file that includes all the other files necessary for that type of page to run. This gives a good balance between control and necessary code to type, so that you're not initializing databases for pages that don't use a database, while you also don't have to code every include for every page manually. Remember: Don't Repeat Yourself.