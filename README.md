### Introduction

This package is used to generate [firebase dynamic](https://firebase.google.com/docs/dynamic-links) link for laravel application.

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

 Set the following credentials to `.env` file.

    FIREBASE_URL=    //DefaultValue = https://firebasedynamiclinks.googleapis.com/v1/shortLinks
    FIREBASE_DOMAIN=
    FIREBASE_API_KEY=
    FIREBASE_ANDROID_PACKAGE_NAME=
    FIREBASE_IOS_BUNDLE_ID=

To find Firebase API key follow the below steps

- STEP 1: Go to [Firebase Console](https://console.firebase.google.com/)
- STEP 2: Select your Project
- STEP 3: Click on Settings icon and select Project Settings
- STEP 4: Select CLOUD MESSAGING tab and `Server Key` is the API Key.

To set your application's Firebase Domain follow the below steps:

- STEP 1: Go to [Firebase Console](https://console.firebase.google.com/)
- STEP 2: Select your Project
- STEP 3: Look at left side menu bar
    - Engage->Dynamic Link
- STEP 4: Use default link like `your-project.page.link` or set the custom domain.

### Disable Link generation
Set the following environment variable to disable link generation:

    DISABLE_DYNAMIC_LINK_GENERATION=true
    

### Example

Using Facade

    EnzDynamicLink::generate($linkThatYouWantToShare);

Using `DynamicLink` Class

    $dLink = new \Enzaime\DynamicLink\DynamicLink();
    $dLink->generate($linkThatYouWantToShare);

### Assertion

The following assertion methods can be used for the test cases.

    EnzDynamicLink::fake();
    $link = 'https://enzaime.com';

    EnzDynamicLink::generate($link);
    
    EnzDynamicLink::assertGenerateMethodCalled();

    EnzDynamicLink::assertGenerated($link);
    
    EnzDynamicLink::assertNotGenerated("$link?test=not-generated");

### Running Test

    composer update
    composer test
