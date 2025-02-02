<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distritos = [
            ['id'=> 1	,'departamento_id' => 1, 'municipio_id' => 1 ,'nombre'=> 'Atiquizaya'],
            ['id'=> 2	,'departamento_id' => 1, 'municipio_id' => 1 ,'nombre'=> 'El Refugio'],
            ['id'=> 3	,'departamento_id' => 1, 'municipio_id' => 1 ,'nombre'=> 'San Lorenzo'],
            ['id'=> 4	,'departamento_id' => 1, 'municipio_id' => 1 ,'nombre'=> 'Turín'],
            ['id'=> 5	,'departamento_id' => 1, 'municipio_id' => 2 ,'nombre'=> 'Ahuachapán'],
            ['id'=> 6	,'departamento_id' => 1, 'municipio_id' => 2 ,'nombre'=> 'Apaneca'],
            ['id'=> 7	,'departamento_id' => 1, 'municipio_id' => 2 ,'nombre'=> 'Concepción de Ataco'],
            ['id'=> 8	,'departamento_id' => 1, 'municipio_id' => 2 ,'nombre'=> 'Tacuba'],
            ['id'=> 9	,'departamento_id' => 1, 'municipio_id' => 3 ,'nombre'=> 'Guaymango'],
            ['id'=> 10	,'departamento_id' => 1, 'municipio_id' => 3 ,'nombre'=> 'Jujutla'],
            ['id'=> 11	,'departamento_id' => 1, 'municipio_id' => 3 ,'nombre'=> 'San Francisco Menendez'],
            ['id'=> 12	,'departamento_id' => 1, 'municipio_id' => 3 ,'nombre'=> 'San Pedro Puxtla'],
            ['id'=> 13	,'departamento_id' => 2, 'municipio_id' => 4 ,'nombre'=> 'Sensuntepeque'],
            ['id'=> 14	,'departamento_id' => 2, 'municipio_id' => 4 ,'nombre'=> 'Victoria'],
            ['id'=> 15	,'departamento_id' => 2, 'municipio_id' => 4 ,'nombre'=> 'Dolores'],
            ['id'=> 16	,'departamento_id' => 2, 'municipio_id' => 4 ,'nombre'=> 'Guacotecti'],
            ['id'=> 17	,'departamento_id' => 2, 'municipio_id' => 4 ,'nombre'=> 'San Isidro'],
            ['id'=> 18	,'departamento_id' => 2, 'municipio_id' => 5 ,'nombre'=> 'Ilobasco'],
            ['id'=> 19	,'departamento_id' => 2, 'municipio_id' => 5 ,'nombre'=> 'Tejutepeque'],
            ['id'=> 20	,'departamento_id' => 2, 'municipio_id' => 5 ,'nombre'=> 'Jutiapa'],
            ['id'=> 21	,'departamento_id' => 2, 'municipio_id' => 5 ,'nombre'=> 'Cinquera'],
            ['id'=> 22	,'departamento_id' => 3, 'municipio_id' => 6 ,'nombre'=> 'La Palma'],
            ['id'=> 23	,'departamento_id' => 3, 'municipio_id' => 6 ,'nombre'=> 'Citalá'],
            ['id'=> 24	,'departamento_id' => 3, 'municipio_id' => 6 ,'nombre'=> 'San Ignacio'],
            ['id'=> 25	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'Nueva Concepción'],
            ['id'=> 26	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'Tejutla'],
            ['id'=> 27	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'La Reina'],
            ['id'=> 28	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'Agua Caliente'],
            ['id'=> 29	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'Dulce Nombre de María'],
            ['id'=> 30	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'El Paraíso'],
            ['id'=> 31	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'San Francisco Morazán'],
            ['id'=> 32	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'San Rafael'],
            ['id'=> 33	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'Santa Rita'],
            ['id'=> 34	,'departamento_id' => 3, 'municipio_id' => 7 ,'nombre'=> 'San Fernando'],
            ['id'=> 35	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Chalatenango'],
            ['id'=> 36	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Arcatao'],
            ['id'=> 37	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Azacualpa'],
            ['id'=> 38	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Comalapa'],
            ['id'=> 39	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Concepción Quezaltepeque'],
            ['id'=> 40	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'El Carrizal'],
            ['id'=> 41	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'La Laguna'],
            ['id'=> 42	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Las Vueltas'],
            ['id'=> 43	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Nombre de Jesús'],
            ['id'=> 44	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Nueva Trinidad'],
            ['id'=> 45	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Ojos de Agua'],
            ['id'=> 46	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'Potonico'],
            ['id'=> 47	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Antonio de La Cruz'],
            ['id'=> 48	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Antonio Los Ranchos'],
            ['id'=> 49	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Francisco Lempa'],
            ['id'=> 50	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Isidro Labrador'],
            ['id'=> 51	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San José Cancasque'],
            ['id'=> 52	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Miguel de Mercedes'],
            ['id'=> 53	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San José Las Flores'],
            ['id'=> 54	,'departamento_id' => 3, 'municipio_id' => 8 ,'nombre'=> 'San Luis del Carmen'],
            ['id'=> 55	,'departamento_id' => 4, 'municipio_id' => 9 ,'nombre'=> 'Suchitoto'],
            ['id'=> 56	,'departamento_id' => 4, 'municipio_id' => 9 ,'nombre'=> 'San José Guayabal'],
            ['id'=> 57	,'departamento_id' => 4, 'municipio_id' => 9 ,'nombre'=> 'Oratorio de Concepción'],
            ['id'=> 58	,'departamento_id' => 4, 'municipio_id' => 9 ,'nombre'=> 'San Bartolomé Perulapán'],
            ['id'=> 59	,'departamento_id' => 4, 'municipio_id' => 9 ,'nombre'=> 'San Pedro Perulapán'],
            ['id'=> 60	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Cojutepeque'],
            ['id'=> 61	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'San Rafael Cedros'],
            ['id'=> 62	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Candelaria'],
            ['id'=> 63	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Monte San Juan'],
            ['id'=> 64	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'El Carmen'],
            ['id'=> 65	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'San Cristóbal'],
            ['id'=> 66	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Santa Cruz Michapa'],
            ['id'=> 67	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'San Ramón'],
            ['id'=> 68	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'El Rosario'],
            ['id'=> 69	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Santa Cruz Analquito'],
            ['id'=> 70	,'departamento_id' => 4, 'municipio_id' => 10 ,'nombre'=> 'Tenancingo'],
            ['id'=> 71	,'departamento_id' => 5, 'municipio_id' => 11 ,'nombre'=> 'Quezaltepeque'],
            ['id'=> 72	,'departamento_id' => 5, 'municipio_id' => 11 ,'nombre'=> 'San Matías'],
            ['id'=> 73	,'departamento_id' => 5, 'municipio_id' => 11 ,'nombre'=> 'San Pablo Tacachico'],
            ['id'=> 74	,'departamento_id' => 5, 'municipio_id' => 12 ,'nombre'=> 'San Juan Opico'],
            ['id'=> 75	,'departamento_id' => 5, 'municipio_id' => 12 ,'nombre'=> 'Ciudad Arce'],
            ['id'=> 76	,'departamento_id' => 5, 'municipio_id' => 13 ,'nombre'=> 'Colón'],
            ['id'=> 77	,'departamento_id' => 5, 'municipio_id' => 13 ,'nombre'=> 'Jayaque'],
            ['id'=> 78	,'departamento_id' => 5, 'municipio_id' => 13 ,'nombre'=> 'Sacacoyo'],
            ['id'=> 79	,'departamento_id' => 5, 'municipio_id' => 13 ,'nombre'=> 'Tepecoyo'],
            ['id'=> 80	,'departamento_id' => 5, 'municipio_id' => 13 ,'nombre'=> 'Talnique'],
            ['id'=> 81	,'departamento_id' => 5, 'municipio_id' => 14 ,'nombre'=> 'Antiguo Cuscatlán'],
            ['id'=> 82	,'departamento_id' => 5, 'municipio_id' => 14 ,'nombre'=> 'Huizúcar'],
            ['id'=> 83	,'departamento_id' => 5, 'municipio_id' => 14 ,'nombre'=> 'Nuevo Cuscatlán'],
            ['id'=> 84	,'departamento_id' => 5, 'municipio_id' => 14 ,'nombre'=> 'San José Villanueva'],
            ['id'=> 85	,'departamento_id' => 5, 'municipio_id' => 14 ,'nombre'=> 'Zaragoza'],
            ['id'=> 86	,'departamento_id' => 5, 'municipio_id' => 15 ,'nombre'=> 'Chiltuipán'],
            ['id'=> 87	,'departamento_id' => 5, 'municipio_id' => 15 ,'nombre'=> 'Jicalapa'],
            ['id'=> 88	,'departamento_id' => 5, 'municipio_id' => 15 ,'nombre'=> 'La Libertad'],
            ['id'=> 89	,'departamento_id' => 5, 'municipio_id' => 15 ,'nombre'=> 'Tamanique'],
            ['id'=> 90	,'departamento_id' => 5, 'municipio_id' => 15 ,'nombre'=> 'Teotepeque'],
            ['id'=> 91	,'departamento_id' => 5, 'municipio_id' => 16 ,'nombre'=> 'Comasagua'],
            ['id'=> 92	,'departamento_id' => 5, 'municipio_id' => 16 ,'nombre'=> 'Santa Tecla'],
            ['id'=> 93	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'Cuyultitán'],
            ['id'=> 94	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'Olocuilta'],
            ['id'=> 95	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'San Juan Talpa'],
            ['id'=> 96	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'San Luis Talpa'],
            ['id'=> 97	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'San Pedro Masahuat'],
            ['id'=> 98	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'Tapalhuaca'],
            ['id'=> 99	,'departamento_id' => 6, 'municipio_id' => 17 ,'nombre'=> 'San Francisco Chinameca'],
            ['id'=> 100	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'El Rosario'],
            ['id'=> 101	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'Jerusalén'],
            ['id'=> 102	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'Mercedes La Ceiba'],
            ['id'=> 103	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'Paraíso de Osorio'],
            ['id'=> 104	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Antonio Masahuat'],
            ['id'=> 105	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Emigdio'],
            ['id'=> 106	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Juan Tepezontes'],
            ['id'=> 107	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Luis La Herradura'],
            ['id'=> 108	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Miguel Tepezontes'],
            ['id'=> 109	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'San Pedro Nonualco'],
            ['id'=> 110	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'Santa María Ostuma'],
            ['id'=> 111	,'departamento_id' => 6, 'municipio_id' => 18 ,'nombre'=> 'Santiago Nonualco'],
            ['id'=> 112	,'departamento_id' => 6, 'municipio_id' => 19 ,'nombre'=> 'San Juan Nonualco'],
            ['id'=> 113	,'departamento_id' => 6, 'municipio_id' => 19 ,'nombre'=> 'San Rafael Obrajuelo'],
            ['id'=> 114	,'departamento_id' => 6, 'municipio_id' => 19 ,'nombre'=> 'Zacatecoluca'],
            ['id'=> 115	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Anamorós'],
            ['id'=> 116	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Bolivar'],
            ['id'=> 117	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Concepción de Oriente'],
            ['id'=> 118	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'El Sauce'],
            ['id'=> 119	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Lislique'],
            ['id'=> 120	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Nueva Esparta'],
            ['id'=> 121	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Pasaquina'],
            ['id'=> 122	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Polorós'],
            ['id'=> 123	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'San José La Fuente'],
            ['id'=> 124	,'departamento_id' => 7, 'municipio_id' => 20 ,'nombre'=> 'Santa Rosa de Lima'],
            ['id'=> 125	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'Conchagua'],
            ['id'=> 126	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'El Carmen'],
            ['id'=> 127	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'Intipucá'],
            ['id'=> 128	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'La Unión'],
            ['id'=> 129	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'Meanguera del Golfo'],
            ['id'=> 130	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'San Alejo'],
            ['id'=> 131	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'Yayantique'],
            ['id'=> 132	,'departamento_id' => 7, 'municipio_id' => 21 ,'nombre'=> 'Yucuaiquín'],
            ['id'=> 133	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Arambala'],
            ['id'=> 134	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Cacaopera'],
            ['id'=> 135	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Corinto'],
            ['id'=> 136	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'El Rosario'],
            ['id'=> 137	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Joateca'],
            ['id'=> 138	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Jocoaitique'],
            ['id'=> 139	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Meanguera'],
            ['id'=> 140	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Perquín'],
            ['id'=> 141	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'San Fernando'],
            ['id'=> 142	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'San Isidro'],
            ['id'=> 143	,'departamento_id' => 8, 'municipio_id' => 22 ,'nombre'=> 'Torola'],
            ['id'=> 144	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Chilanga'],
            ['id'=> 145	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Delicias de Concepción'],
            ['id'=> 146	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'El Divisadero'],
            ['id'=> 147	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Gualococti'],
            ['id'=> 148	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Guatajiagua'],
            ['id'=> 149	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Jocoro'],
            ['id'=> 150	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Lolotiquillo'],
            ['id'=> 151	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Osicala'],
            ['id'=> 152	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'San Carlos'],
            ['id'=> 153	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'San Francisco Gotera'],
            ['id'=> 154	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'San Simón'],
            ['id'=> 155	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Sensembra'],
            ['id'=> 156	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Sociedad'],
            ['id'=> 157	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Yamabal'],
            ['id'=> 158	,'departamento_id' => 8, 'municipio_id' => 23 ,'nombre'=> 'Yoloaiquín'],
            ['id'=> 159	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'Ciudad Barrios'],
            ['id'=> 160	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'Sesori'],
            ['id'=> 161	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'Nuevo Edén de San Juan'],
            ['id'=> 162	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'San Gerardo'],
            ['id'=> 163	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'San Luis de La Reina'],
            ['id'=> 164	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'Carolina'],
            ['id'=> 165	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'San Antonio del Mosco'],
            ['id'=> 166	,'departamento_id' => 9, 'municipio_id' => 24 ,'nombre'=> 'Chapeltique'],
            ['id'=> 167	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'San Miguel'],
            ['id'=> 168	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'Comacarán'],
            ['id'=> 169	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'Uluazapa'],
            ['id'=> 170	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'Moncagua'],
            ['id'=> 171	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'Quelepa'],
            ['id'=> 172	,'departamento_id' => 9, 'municipio_id' => 25 ,'nombre'=> 'Chirilagua'],
            ['id'=> 173	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'Chinameca'],
            ['id'=> 174	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'Nueva Guadalupe'],
            ['id'=> 175	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'Lolotique'],
            ['id'=> 176	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'San Jorge'],
            ['id'=> 177	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'San Rafael Oriente'],
            ['id'=> 178	,'departamento_id' => 9, 'municipio_id' => 26 ,'nombre'=> 'El Tránsito'],
            ['id'=> 179	,'departamento_id' =>10, 'municipio_id' => 27 ,'nombre'=> 'Aguilares'],
            ['id'=> 180	,'departamento_id' =>10, 'municipio_id' => 27 ,'nombre'=> 'El Paisnal'],
            ['id'=> 181	,'departamento_id' =>10, 'municipio_id' => 27 ,'nombre'=> 'Guazapa'],
            ['id'=> 182	,'departamento_id' =>10, 'municipio_id' => 28 ,'nombre'=> 'Apopa'],
            ['id'=> 183	,'departamento_id' =>10, 'municipio_id' => 28 ,'nombre'=> 'Nejapa'],
            ['id'=> 184	,'departamento_id' =>10, 'municipio_id' => 29 ,'nombre'=> 'Ilopango'],
            ['id'=> 185	,'departamento_id' =>10, 'municipio_id' => 29 ,'nombre'=> 'San Martín'],
            ['id'=> 186	,'departamento_id' =>10, 'municipio_id' => 29 ,'nombre'=> 'Soyapango'],
            ['id'=> 187	,'departamento_id' =>10, 'municipio_id' => 29 ,'nombre'=> 'Tonacatepeque'],
            ['id'=> 188	,'departamento_id' =>10, 'municipio_id' => 30 ,'nombre'=> 'Ayutuxtepeque'],
            ['id'=> 189	,'departamento_id' =>10, 'municipio_id' => 30 ,'nombre'=> 'Mejicanos'],
            ['id'=> 190	,'departamento_id' =>10, 'municipio_id' => 30 ,'nombre'=> 'San Salvador'],
            ['id'=> 191	,'departamento_id' =>10, 'municipio_id' => 30 ,'nombre'=> 'Cuscatancingo'],
            ['id'=> 192	,'departamento_id' =>10, 'municipio_id' => 30 ,'nombre'=> 'Ciudad Delgado'],
            ['id'=> 193	,'departamento_id' =>10, 'municipio_id' => 31 ,'nombre'=> 'Panchimalco'],
            ['id'=> 194	,'departamento_id' =>10, 'municipio_id' => 31 ,'nombre'=> 'Rosario de Mora'],
            ['id'=> 195	,'departamento_id' =>10, 'municipio_id' => 31 ,'nombre'=> 'San Marcos'],
            ['id'=> 196	,'departamento_id' =>10, 'municipio_id' => 31 ,'nombre'=> 'Santo Tomás'],
            ['id'=> 197	,'departamento_id' =>10, 'municipio_id' => 31 ,'nombre'=> 'Santiago Texacuangos'],
            ['id'=> 198	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'Apastepeque'],
            ['id'=> 199	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'Santa Clara'],
            ['id'=> 200	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'San Ildefonso'],
            ['id'=> 201	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'San Esteban Catarina'],
            ['id'=> 202	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'San Sebastián'],
            ['id'=> 203	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'San Lorenzo'],
            ['id'=> 204	,'departamento_id' =>11, 'municipio_id' => 32 ,'nombre'=> 'Santo Domingo'],
            ['id'=> 205	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'San Vicente'],
            ['id'=> 206	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'Guadalupe'],
            ['id'=> 207	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'Verapaz'],
            ['id'=> 208	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'Tepetitán'],
            ['id'=> 209	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'Tecoluca'],
            ['id'=> 210	,'departamento_id' =>11, 'municipio_id' => 33 ,'nombre'=> 'San Cayetano Istepeque'],
            ['id'=> 211	,'departamento_id' =>12, 'municipio_id' => 34 ,'nombre'=> 'Masahuat'],
            ['id'=> 212	,'departamento_id' =>12, 'municipio_id' => 34 ,'nombre'=> 'Metapán'],
            ['id'=> 213	,'departamento_id' =>12, 'municipio_id' => 34 ,'nombre'=> 'Santa Rosa Guachipilín'],
            ['id'=> 214	,'departamento_id' =>12, 'municipio_id' => 34 ,'nombre'=> 'Texistepeque'],
            ['id'=> 215	,'departamento_id' =>12, 'municipio_id' => 35 ,'nombre'=> 'Santa Ana'],
            ['id'=> 216	,'departamento_id' =>12, 'municipio_id' => 36 ,'nombre'=> 'Coatepeque'],
            ['id'=> 217	,'departamento_id' =>12, 'municipio_id' => 36 ,'nombre'=> 'El Congo'],
            ['id'=> 218	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'Candelaria de la Frontera'],
            ['id'=> 219	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'Chalchuapa'],
            ['id'=> 220	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'El Porvenir'],
            ['id'=> 221	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'San Antonio Pajonal'],
            ['id'=> 222	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'San Sebastián Salitrillo'],
            ['id'=> 223	,'departamento_id' =>12, 'municipio_id' => 37 ,'nombre'=> 'Santiago de La Frontera'],
            ['id'=> 224	,'departamento_id' =>13, 'municipio_id' => 38 ,'nombre'=> 'Juayúa'],
            ['id'=> 225	,'departamento_id' =>13, 'municipio_id' => 38 ,'nombre'=> 'Nahuizalco'],
            ['id'=> 226	,'departamento_id' =>13, 'municipio_id' => 38 ,'nombre'=> 'Salcoatitán'],
            ['id'=> 227	,'departamento_id' =>13, 'municipio_id' => 38 ,'nombre'=> 'Santa Catarina Masahuat'],
            ['id'=> 228	,'departamento_id' =>13, 'municipio_id' => 39 ,'nombre'=> 'Sonsonate'],
            ['id'=> 229	,'departamento_id' =>13, 'municipio_id' => 39 ,'nombre'=> 'Sonzacate'],
            ['id'=> 230	,'departamento_id' =>13, 'municipio_id' => 39 ,'nombre'=> 'Nahulingo'],
            ['id'=> 231	,'departamento_id' =>13, 'municipio_id' => 39 ,'nombre'=> 'San Antonio del Monte'],
            ['id'=> 232	,'departamento_id' =>13, 'municipio_id' => 39 ,'nombre'=> 'Santo Domingo de Guzmán'],
            ['id'=> 233	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'Izalco'],
            ['id'=> 234	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'Armenia'],
            ['id'=> 235	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'Caluco'],
            ['id'=> 236	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'San Julián'],
            ['id'=> 237	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'Cuisnahuat'],
            ['id'=> 238	,'departamento_id' =>13, 'municipio_id' => 40 ,'nombre'=> 'Santa Isabel Ishuatán'],
            ['id'=> 239	,'departamento_id' =>13, 'municipio_id' => 41 ,'nombre'=> 'Acajutla'],
            ['id'=> 240	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Santiago de María'],
            ['id'=> 241	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Alegría'],
            ['id'=> 242	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Berlín'],
            ['id'=> 243	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Mercedes Umaña'],
            ['id'=> 244	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Jucuapa'],
            ['id'=> 245	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'El Triunfo'],
            ['id'=> 246	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Estanzuelas'],
            ['id'=> 247	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'San Buenaventura'],
            ['id'=> 248	,'departamento_id' =>14, 'municipio_id' => 42 ,'nombre'=> 'Nueva Granada'],
            ['id'=> 249	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Usulután'],
            ['id'=> 250	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Jucuarán'],
            ['id'=> 251	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'San Dionisio'],
            ['id'=> 252	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Concepción Batres'],
            ['id'=> 253	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Santa María'],
            ['id'=> 254	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Ozatlán'],
            ['id'=> 255	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Tecapán'],
            ['id'=> 256	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Santa Elena'],
            ['id'=> 257	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'California'],
            ['id'=> 258	,'departamento_id' =>14, 'municipio_id' => 43 ,'nombre'=> 'Ereguayquín'],
            ['id'=> 259	,'departamento_id' =>14, 'municipio_id' => 44 ,'nombre'=> 'Jiquilisco'],
            ['id'=> 260	,'departamento_id' =>14, 'municipio_id' => 44 ,'nombre'=> 'Puerto El Triunfo'],
            ['id'=> 261	,'departamento_id' =>14, 'municipio_id' => 44 ,'nombre'=> 'San Agustín'],
            ['id'=> 262	,'departamento_id' =>14, 'municipio_id' => 44 ,'nombre'=> 'San Francisco Javier']
        ];

        \DB::table('distritos')->insert($distritos);

    }
}
