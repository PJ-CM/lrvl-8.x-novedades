<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);

        // Ejemplo de ejecución de un Factory
        // -> [ ANTES ]
        //$user = factory(User::class)->create();

        // -> [ AHORA ]
        //  >> Forma Posible
        ////$user = UserFactory::new()->create();
        //  >> Forma Recomendada
        ////$user = User::factory()->create();

        // -> Otras posibilidades ya existentes en versiones anteriores

        //  >> crear más de un registro con la misma orden por medio de "times()" o "count()"
        //  Tener en cuenta que "times()", internamente, llama a "count()"
        ////$user = User::factory()->times(2)->create();
        //$user = User::factory()->count(2)->create();

        //  >> se pueden sobreescribir cualquiera de los atributos del factory
        //$user = User::factory()->count(2)->create([
        ////$user = User::factory()->create([
        ////    'email' => 'pep@gua.es',
        ////]);
        //¡ATENCIÓN! No es que en la sobreescritura no se pueda generar más de un factory sino
        //que el atributo sobreescrito deb ser único y, por ello, no acepta valores repetidos
        //como se está estableciendo con la sobreescritura.

        //  >> se pueden generar registros virtuales o instancias del modelo, que no llegan a
        //  ser insertados en la tabla
        ////$user = User::factory()->count(4)->make([
        ////    'email' => 'pep@gua.es',
        ////]);

        //  >> empleando un estado definido

        ////$user = User::factory()->count(2)->verifiedEmail()->make();
        ////$user = User::factory()->count(2)->make();

        //  >> empleando una secuencia de estados

        ////$user = User::factory()->count(5)->state(new Sequence(
        ////    [
        ////        'email_verified_at' => now(),
        ////    ],
        ////    [
        ////        'email_verified_at' => null,
        ////    ],
        ////    //No es posible esto porque lo que devuelve es un Object en vez de un Array
        ////    //User::factory()->verifiedEmail(),
        ////))->make();

        //  >> empleando relaciones en los Factories
        // un USER con 4 POSTS
        ////$user = User::factory()->has(Post::factory()->count(4))->make();
        ////$user = User::factory()->has(Post::factory()->count(4))->create();
        // cada USER con 4 POSTS
        ////$user = User::factory()->count(3)->has(Post::factory()->count(4))->create();
        //o así
        ////$user = User::factory()
        ////                ->count(3)
        ////                ->hasPosts(4)
        ////                ->create();

        ////dump($user->toArray());

        ////dump($user->posts->toArray());
        //Esta consulta da ERROR cuando se generan varios registros de User al mismo tiempo.
        //En este caso, se deben sacar los datos de esta otra forma:
        ////$user->each(function ($user) {
        ////    dump($user->posts->toArray());
        ////});

        $post = Post::factory()
                        ->count(3)
                        ->forUser()
                        ->create();

        dump($post->toArray());
    }
}
