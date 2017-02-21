<?php


namespace JeroenNoten\LaravelContact;


use JeroenNoten\LaravelMenu\Pages\Page;
use JeroenNoten\LaravelMenu\Pages\Provider;

class ContactPageProvider implements Provider
{
    public function getPages()
    {
        return [new Page('Contact', 'contact')];
    }
}