FOSAdvancedEncoderBundle
========================

## Features

The FOSAdvancedEncoderBundle adds support for changing the encoder on an
instance basis instead of using the same encoder for all instances of a class.

## Installation


### Add FOSAdvancedEncoderBundle to your vendor/bundles dir

Ultimately, the FOSAdvancedEncoderBundle files should be downloaded to the
`vendor/bundles/FOS/AdvancedEncoderBundle` directory.

This can be done in several ways, depending on your preference. The first
method is the standard Symfony2 method.

**Using the vendors script**

Add the following lines in your `deps` file:

    [FOSAdvancedEncoderBundle]
        git=git://github.com/FriendsOfSymfony/FOSAdvancedEncoderBundle.git
        target=bundles/FOS/AdvancedEncoderBundle

Now, run the vendors script to download the bundle:

    php bin/vendors install

**Using submodules**

If you prefer instead to use git submodules, the run the following:

    git submodule add git://github.com/friendsofsymfony/FOSAdvancedEncoderBundle.git vendor/bundles/FOS/AdvancedEncoderBundle

### Register the FOS namespace

    // app/autoload.php
    $loader->registerNamespaces(array(
        'FOS'  => __DIR__.'/../vendor/bundles',
        // your other namespaces
    ));

### Add FOSAdvancedEncoderBundle to your application kernel

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new FOS\AdvancedEncoderBundle\FOSAdvancedEncoderBundle(),
            // ...
        );
    }

## Configure the encoders

You now need to configure the encoders available for the factory used by
the bundle. They are identified by a name used to reference them later. The
configuration keys available are exactly the same than for the SecurityBundle
encoder configuration.

    fos_advanced_encoder:
        encoders:
            my_encoder:
                algorithm: sha512
                iterations: 5000
                encode_as_base64: true
            another_encoder: sha1    # shortcut for the previous way
            my_plain_encoder:
                algorithm: plaintext
                ignore_case: false
            my_custom_encoder:
                id: some_service_id

## Use the bundle

You can now implement the `FOS\AdvancedEncoderBundle\Security\Encoder\EncoderAwareInterface`
interface in your User class. It consist of a single method `getEncoderName`
returning the name of an encoder defined previously or `null`.

If you return `null`, the standard factory of SecurityBundle will be used
(as if you were not using the interface at all). Otherwise, the encoder will
be retrieved by its name.
