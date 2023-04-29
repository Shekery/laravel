<?php

namespace Database\Seeders;

use App\Models\Organizations;
use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = array(
            0 => array('1', 'ОсОО "Кондитерский Дом Куликовский"', 'КДК'),
            1 => array('2', 'ТОО "Куликовский Казахстан"', 'Казахстан'),
            2 => array('3', 'ООО "Куликовский Новобисирск"', 'Россия'),
            3 => array('4', 'ООО "KD KULIKOV"', 'Узбекистан'),
            4 => array('5', 'ОсОО "Семейные традиции"', 'СТ'),
            5 => array('6', 'ОсОО "Золото Тянь-Шаня"', 'ЗТШ'),
            6 => array('7', 'ОсОО "Куликофе"', 'Куликофе'),
            7 => array('8', 'ООО "Сладости для радости"', 'NULL'),
            8 => array('9', 'ООО "Жить вкусно"', 'NULL'),
            9 => array('10', 'ИП Таран (ФМ Айнабулак 3)', 'NULL'),
            10 => array('11', 'ИП Сеитова (ФМ Уш-Сункар)', 'NULL'),
            11 => array('12', 'ИП Чернова (ФМ Сейфуллина)', 'NULL'),
            12 => array('13', 'ИП Чалабаева К.Т. (ФМ Айнабулак)', 'NULL'),
            13 => array('14', 'ИП GOGOL (ФМ Гоголя)', 'NULL'),
            14 => array('15', 'ООО "Кулифуд"', 'Кулифуд'),
            15 => array('16', 'ООО "Куликофе Новобисирск"', 'NULL'),
            16 => array('18', 'ООО "Смородинка"', 'NULL'),
            17 => array('19', 'Магазины КДК', 'Магазины КДК')
        );

        foreach ($organizations as $organization) {
            $keysedOrganizations = [
                'id' => $organization[0],
                'name' => $organization[1],
                'abbreviation' => $organization[2]
            ];
            Organizations::create($keysedOrganizations);
        }
    }
}
