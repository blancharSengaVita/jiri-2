<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Blanchar Senga-Vita',
            'email' => 'anchar2107@gmail.com',
            'password' => bcrypt('change_this'),
        ]);

        $dominique = User::factory()
            ->has(Jiri::factory()->count(2))
            ->has(Project::factory()->count(4))
            ->has(Contact::factory()->count(10))
            ->create([
                'name' => 'Dominique Vilain',
                'email' => 'dominique.vilain@hepl.be',
                'password' => bcrypt('change_this'),
            ]);
        $myriam = User::factory()
            ->has(Jiri::factory()->count(2))
            ->has(Project::factory()->count(4))
            ->has(Contact::factory()->count(10))
            ->create([
                'name' => 'Myriam Dupont',
                'email' => 'myriam.dupont@hepl.be',
                'password' => bcrypt('change_this'),
            ]);

        $users = collect([$dominique, $myriam]);

        foreach ($users as $user) {
            foreach ($user->jiris as $jiri) {
                $selectedContacts = $user->contacts->random(random_int(3, 10));
                $selectedProjects = $user->projects->random(random_int(1, 4));

                foreach ($selectedContacts as $contact) {
                    $role = random_int(0, 1) ? 'students' : 'evaluators';

                    $jiri->$role()->attach([
                        $contact->id => [
                            'role' => str($role)->beforeLast('s'),
                        ],
                    ]);


                    if ($role === 'students') {
                        $contact->projects()->attach(
                            $user->projects->random(2),
                            [
                                'jiri_id' => $jiri->id,
                                'urls' => json_encode([
                                    'github' => 'https://github.com',
                                    'trello' => 'https://trello.com'], JSON_THROW_ON_ERROR),
                            ]
                        );
                    }
                    if ($role === 'evaluators') {
                        //create access token for evaluator
                        $contact->jiris()->updateExistingPivot($jiri->id, [
                            'token' => Str::random(32),
                        ]);
                    }
                }

                foreach ($selectedProjects as $project) {
                    $jiri->projects()->attach($project->id);
                }

                foreach ($selectedProjects as $project) {
                    $weighting = 100/$jiri->projects->count();
                    $jiri->projects()->updateExistingPivot($project->id, ['weighting' => $weighting]);
                }
            }
        }

    }
}
