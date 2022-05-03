<?php

namespace App\Factory;

use App\Entity\Qualification;
use App\Repository\QualificationRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Qualification>
 *
 * @method static Qualification|Proxy createOne(array $attributes = [])
 * @method static Qualification[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Qualification|Proxy find(object|array|mixed $criteria)
 * @method static Qualification|Proxy findOrCreate(array $attributes)
 * @method static Qualification|Proxy first(string $sortedField = 'id')
 * @method static Qualification|Proxy last(string $sortedField = 'id')
 * @method static Qualification|Proxy random(array $attributes = [])
 * @method static Qualification|Proxy randomOrCreate(array $attributes = [])
 * @method static Qualification[]|Proxy[] all()
 * @method static Qualification[]|Proxy[] findBy(array $attributes)
 * @method static Qualification[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Qualification[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static QualificationRepository|RepositoryProxy repository()
 * @method Qualification|Proxy create(array|callable $attributes = [])
 */
final class QualificationFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'Qualification_Name' => self::faker()->text(),
            'Expiry_Date' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Qualification $qualification): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Qualification::class;
    }
}
