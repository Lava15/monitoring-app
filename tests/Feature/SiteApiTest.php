<?php


it('can load api end point', function () {
    $this->getJson('/api/v1/sites')->assertStatus(200);
});
