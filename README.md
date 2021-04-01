### Integration

Add the following repository to project's `composer.json`.

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/enzaime/dynamic-link.git"
        },
        ....
    ],

Now, run `composer require enzaime/dynamic-link` command from your project terminal.

### Environment Variable

Modify the `.env` file to set the credentials;

    FIREBASE_URL=    //DefaultValue = https://firebasedynamiclinks.googleapis.com/v1/shortLinks
    FIREBASE_DOMAIN=
    FIREBASE_API_KEY=
    FIREBASE_ANDROID_PACKAGE_NAME=
    FIREBASE_IOS_BUNDLE_ID=

### Example

Using Facade

    EnzDynamicLink::generate($linkThatYouWantToShare);

Using `DynamicLink` Class

    $dLink = new \Enzaime\DynamicLink\DynamicLink();
    $dLink->generate($linkThatYouWantToShare);

### Running Test

    composer update
    composer test
