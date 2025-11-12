<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = [
            //Grupo A
            [
                'nombre' => 'QATAR',
                'imagen' => '/images/selecciones/qatar.jpg',
                'descripcion' => 'Está coordinada por la Asociación de Fútbol de Catar, perteneciente a la Confederación Asiática de Fútbol. Su máximo logro es la Copa Asiática, la competición continental organizada por la AFC, que logró ganar en la edición 2019 bajo el mando del español Félix Sánchez Bas, quien también es el entrenador del conjunto oriental desde 2017. Tendrá su primera participación en la Copa Mundial de la FIFA en 2022, cuando también actúe de anfitrión.',
                'grupo' => 1
            ],
            [
                'nombre' => 'ECUADOR',
                'imagen' => '/images/selecciones/ecuador.jpg',
                'descripcion' => 'Qatar 2022 será la cuarta aventura mundialista para Ecuador, que más allá de haber estado ausente en la última Copa del Mundo de Rusia, se convirtió en una fortaleza del fútbol sudamericano: sus cuatro clasificaciones llegaron en los últimos cinco Mundiales.',
                'grupo' => 1
            ],
            [
                'nombre' => 'SENEGAL',
                'imagen' => '/images/selecciones/senegal.jpg',
                'descripcion' => 'Actualmente, es la selección de la Confederación Africana de Fútbol con la posición más alta en la clasificación de la FIFA.En la Copa Africana de Naciones, sus máximos logros son el título en la edición 2021 y dos subcampeonatos en 2002 y 2019.',
                'grupo' => 1
            ],
            [
                'nombre' => 'PAISES BAJOS',
                'imagen' => '/images/selecciones/paisesbajos.jpg',
                'descripcion' => 'Su organización está a cargo de la Real Asociación Neerlandesa de Fútbol (en neerlandés: Koninklijke Nederlandse Voetbalbond), que es una de las asociaciones más antiguas del mundo y pertenece a la UEFA y está afiliada a la FIFA. Ha participado en diez ediciones de la Copa Mundial de Fútbol, donde ha sido subcampeona en tres ediciones de la competición.',
                'grupo' => 1
            ],
            //Grupo B
            [
                'nombre' => 'INGLATERRA',
                'imagen' => '/images/selecciones/inglaterra.jpg',
                'descripcion' => 'Es el equipo representativo del país desde 1809 y es controlado por la Asociación Inglesa de Fútbol (The Football Association) en las competiciones oficiales organizadas por la Unión Europea de Asociaciones de Fútbol y la Federación Internacional de Asociaciones de Fútbol. Es por esto que Inglaterra ha tenido un rol clave en el desarrollo de este deporte, siendo considerados los inventores y promotores del fútbol.',
                'grupo' => 2
            ],
            [
                'nombre' => 'IRAN',
                'imagen' => '/images/selecciones/iran.jpg',
                'descripcion' => 'Es el equipo representativo del país en las competiciones oficiales. Su organización está a cargo de la Federación de Fútbol de la República Islámica de Irán, perteneciente a la AFC. Irán es una de las selecciones más fuertes de Asia. Obtuvo la Copa Asiática en tres ocasiones, todas ellas de manera consecutiva.',
                'grupo' => 2
            ],
            [
                'nombre' => 'ESTADOS UNIDOS',
                'imagen' => '/images/selecciones/estadosunidos.jpg',
                'descripcion' => 'El conjunto que dirige Gregg Berhalter selló su clasificación para Qatar en la última jornada del Octogonal final de la Concacaf, y ahora espera romper ese techo de cristal de los últimos años, cuando se ilusionó con una irrupción entre los mejores que nunca llegó, incluyendo el trago amargo de quedarse sin el boleto en Rusia 2018.',
                'grupo' => 2
            ],
            [
                'nombre' => 'GALES',
                'imagen' => '/images/selecciones/gales.jpg',
                'descripcion' => 'Es el equipo representativo de ese país en las competiciones oficiales. Su organización está a cargo de la Asociación de Fútbol de Gales, perteneciente a la UEFA. La selección del país de Gales es una de las cuatro selecciones que componen el Reino Unido, junto a las selecciones nacionales de fútbol de Escocia, Inglaterra e Irlanda del Norte.',
                'grupo' => 2
            ],
            //Grupo C
            [
                'nombre' => 'ARGENTINA',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Argentina, 3ra en el ránking FIFA, el seleccionado argentino de fútbol, campeón de la última Copa América, conservó el tercer puesto del ranking mundial de la FIFA debajo de Brasil y Bélgica, que también mantuvieron sus posiciones tras actualizarse el escalafón masculino a tres meses del Mundial Qatar 2022.',
                'grupo' => 3
            ],
            [
                'nombre' => 'ARABIA SAUDITA',
                'imagen' => '/images/selecciones/arabiasaudi.jpg',
                'descripcion' => 'Se puede decir que es uno de los equipos más fuertes de Asia, ya que ha ganado en tres ocasiones la Copa Asiática. Su país había organizado la primera Copa FIFA Confederaciones en 1992. Llegó a ser subcampeón perdiendo con Argentina. Su mejor actuación internacional la tuvo en la Copa Mundial de Fútbol de 1994 al clasificar para octavos de final, siendo hasta ahora el único país árabe asiático en llegar a esa instancia.',
                'grupo' => 3
            ],
            [
                'nombre' => 'MEXICO',
                'imagen' => '/images/selecciones/mexico.jpg',
                'descripcion' => 'Su organización está a cargo de la Federación Mexicana de Fútbol, la cual está afiliada a la FIFA desde 1929 y es asociación fundadora de la Concacaf, creada en 1961. La selección mexicana ha participado en dieciséis ediciones de la Copa Mundial de Fútbol, donde ha obtenido resultados notorios en las competiciones que disputó como anfitrión en 1970 y 1986.',
                'grupo' => 3
            ],
            [
                'nombre' => 'POLONIA',
                'imagen' => '/images/selecciones/polonia.jpg',
                'descripcion' => 'Es el equipo representativo del país en las competiciones oficiales. Su organización está a cargo de la Asociación Polaca de Fútbol, perteneciente a la UEFA. La selección polaca de fútbol tuvo una época dorada entre las décadas de 1970 y 1980, cuando alcanzó el tercer puesto en el Mundial del 1974 y del 1982',
                'grupo' => 3
            ],
            //Grupo D
            [
                'nombre' => 'FRANCIA',
                'imagen' => '/images/selecciones/francia.jpg',
                'descripcion' => 'Francia llegará a Qatar 2022 buscando un bicampeonato que no se logra a nivel Mundial desde que Brasil lo consiguió en las ediciones 1958 y 1962.
                Claro que este seleccionado francés aparece como uno de los máximos favoritos a quedarse con el trofeo. Con un plantel que luce incluso por encima del de hace cuatro años, especialmente de mitad de campo en adelante.',
                'grupo' => 4
            ],
            [
                'nombre' => 'DINAMARCA',
                'imagen' => '/images/selecciones/dinamarca.jpg',
                'descripcion' => 'Esta seleccion mantiene una gran rivalidad con la selección de Suecia por la supremacía histórica en ser la mejor selección nórdica, en donde Suecia era antes la única que fue referencia del fútbol internacional, y ahora con los logros daneses ambas están consideradas como algunas de las más potentes selecciones del panorama futbolístico.',
                'grupo' => 4
            ],
            [
                'nombre' => 'TUNEZ',
                'imagen' => '/images/selecciones/tunez.jpg',
                'descripcion' => 'Representa a la Federación Tunecina de Fútbol en las competiciones oficiales organizadas por la Confederación Africana de Fútbol (CAF) y la Federación Internacional de Fútbol Asociación (FIFA). Túnez ha clasificado para cinco Copas Mundiales de Fútbol, siendo la primera Argentina 1978, aunque hasta la fecha no han logrado superar la primera ronda',
                'grupo' => 4
            ],
            [
                'nombre' => 'AUSTRALIA',
                'imagen' => '/images/selecciones/australia.jpg',
                'descripcion' => 'Durante muchos años, Australia lideró el fútbol de Oceanía al ser miembro de la Confederación de Fútbol de Oceanía (OFC) desde su fundación. En los torneos organizados por dicha confederación, Australia logró ganar en cuatro ocasiones la Copa de las Naciones de la OFC, consiguiendo impresionantes resultados al competir contra adversarios de muy bajo nivel, donde solo Nueva Zelanda aparecía como un rival con cierta importancia.',
                'grupo' => 4
            ],
            //Grupo E
            [
                'nombre' => 'ESPAÑA',
                'imagen' => '/images/selecciones/espana.jpg',
                'descripcion' => 'La Selección Española participará este año en su mundial número 16 tras clasificarse a Qatar 2022 a finales del 2021. Un recambio generacional importante que ha mantenido solo a Sergio Busquets como el único futbolista vigente de aquella plantilla que se coronó campeona del mundo en Johannesburgo. ¿El resto? Jóvenes con mucha proyección que ya son titulares habituales en los equipos tops de Europa y que desean repetir la hazaña de sus antecesores hace 12 años.',
                'grupo' => 5
            ],
            [
                'nombre' => 'ALEMANIA',
                'imagen' => '/images/selecciones/alemania.jpg',
                'descripcion' => 'Fija como protagonista en cada Mundial, la selección de Alemania aparece en la previa como uno de los posibles animadores en Qatar 2022, intentando tomarse revancha de un Rusia 2018 que lo vio sorpresivamente eliminado en la primera ronda.
                Con un estilo de juego definido y ultra conocido, más un grupo joven y talentoso acompañado por algunos veteranos de enorme calidad, los dirigidos por Hansi Flick prometen dar que hablar en Qatar.',
                'grupo' => 5
            ],
            [
                'nombre' => 'JAPÓN',
                'imagen' => '/images/selecciones/japon.jpg',
                'descripcion' => 'La Asociación Japonesa fue fundada en 1920, e integrada a la FIFA en 1929. Diez años más tarde se marcharían por motivos referentes a la Segunda Guerra Mundial, y no volverían a afiliarse hasta 1950 y posteriormente a la Confederación Asiática. Antecedentes suficientes para que su primer partido disputado en 1917 frente a la selección de fútbol de China.',
                'grupo' => 5
            ],
            [
                'nombre' => 'COSTA RICA',
                'imagen' => '/images/selecciones/costarica.jpg',
                'descripcion' => 'Luego de su participación en el Mundial de Brasil 2014, se posicionó entre las quince mejores selecciones de fútbol del mundo, ocupando su mejor lugar en la clasificación de la FIFA durante 12 periodos consecutivos desde el 17 de julio del 2014 hasta el 4 de junio del 2015 (Casi un año).
                Eliminatorias Catar 2022 se enfrentó el 14 de junio de 2022 a Nueva Zelanda por la clasificación para la Copa Mundial de Fútbol de 2022. El partido finalizó 1-0 a favor de Costa Rica.',
                'grupo' => 5
            ],
            //Grupo F
            [
                'nombre' => 'BÉLGICA',
                'imagen' => '/images/selecciones/belgica.jpg',
                'descripcion' => 'Bélgica ha madurado hasta convertirse en una superpotencia futbolística absoluta. Dondequiera que compita el equipo, suele convencer. Los Red Devils tienen numerosas superestrellas en sus filas que probablemente todos los demás países del mundo desearían. Sin embargo, el gran éxito en forma de título de campeón mundial aún no se ha logrado. En Rusia estuvieron muy cerca en el Mundial de 2018, pero al final se tuvieron que conformar con el tercer puesto.',
                'grupo' => 6
            ],
            [
                'nombre' => 'CANADÁ',
                'imagen' => '/images/selecciones/canada.jpg',
                'descripcion' => 'Canadá ha sido el equipo revelación de las Eliminatorias de la Concacaf rumbo al Mundial de Qatar 2022. El conjunto de la Hoja de Maple ha desafiado de gran manera el dominio de Estados Unidos y México en la región durante todo el recorrido y especialmente en el Octogonal final que decidió la clasificación. 
                Con un equipo compuesto por jugadores emergentes y una figura internacional, la selección del Norte se está dirigiendo hacia su segunda participación mundialista de la historia.',
                'grupo' => 6
            ],
            [
                'nombre' => 'MARRUECOS',
                'imagen' => 'marruecos.jpg',
                'descripcion' => 'La selección ha participado en 6 mundiales de fútbol (1970, 1986, 1994, 1998, 2018 y 2022). Se destaca su participación en el Mundial de México 86, en el que logró ser el primer país del mundo árabe y de África en pasar a los octavos de final. Tiene varios jugadores jóvenes, como Amine Harit, Othmane Rahouti, Achraf Hakimi, entre otros.',
                'grupo' => 6
            ],
            [
                'nombre' => 'CROACIA',
                'imagen' => '/images/selecciones/croacia.jpg',
                'descripcion' => 'Desde su debut como selección independiente, Croacia ha disputado cinco ediciones de la Copa Mundial de Fútbol, obteniendo unas buenas actuaciones pese a ser una selección de reciente creación. Entre sus logros cuenta con un tercer puesto logrado en el Mundial de Francia 98, firmando una gran actuación en su estreno en la gran cita mundialista. Y el subcampeonato conseguido en el Mundial de Rusia 2018. En la Eurocopa, ha conseguido también notables actuaciones, alcanzando los cuartos de final del torneo en dos ocasiones de las cinco en las que se ha clasificado para el torneo.',
                'grupo' => 6
            ],
            //Grupo G
            [
                'nombre' => 'BRASIL',
                'imagen' => '/images/selecciones/brasil.jpg',
                'descripcion' => 'Es considerada como una de las grandes potencias del fútbol internacional,​ siendo, a nivel de selecciones mayores uno de los países con más copas oficiales ganadas de la historia con veinte títulos. En total Brasil ganó un total de 70 títulos internacionales oficiales, títulos internacionales oficiales sumando los conseguidos a nivel de selecciones principal y de juveniles, tratándose de un récord mundial.',
                'grupo' => 7
            ],
            [
                'nombre' => 'SERBIA',
                'imagen' => '/images/selecciones/serbia.jpg',
                'descripcion' => 'La selección serbia fue la selección nacional de fútbol yugoslava hasta el 4 de febrero de 2003 y, posteriormente, la selección de Serbia y Montenegro hasta el 3 de junio de 2006, cuando Serbia declaró su independencia como Estado sucesor de la Unión Estatal de Serbia y Montenegro.',
                'grupo' => 7
            ],
            [
                'nombre' => 'SUIZA',
                'imagen' => '/images/selecciones/suiza.jpg',
                'descripcion' => 'En Europa los suizos se dieron el lujo de ganar un Grupo C en el que Italia partía como la gran favorita. Esta selección multicultural, compuesta en su mayoría por inmigrantes o por sus hijos, no será a priori una de las candidatas a campeona del mundo, pero seguramente será un equipo al que nadie quiera enfrentar en su camino.',
                'grupo' => 7
            ],
            [
                'nombre' => 'CAMERÚN',
                'imagen' => '/images/selecciones/camerun.jpg',
                'descripcion' => 'Ha logrado clasificarse ocho veces a la Copa Mundial de Fútbol siendo la selección africana que más veces ha asistido al Mundial. Participó en 3 copas confederaciones en el año 2001, 2003 y 2017. En la edición del 2003, llegó a la final perdiendo 1 a 0 con Francia en tiempo extra, siendo la única selección africana que logró llegar a dicha instancia.
                Es junto a Senegal en el 2002 y Ghana en Sudáfrica 2010, una de las selecciones africanas en llegar más lejos en una Copa Mundial de Fútbol, hazaña lograda en Italia 90, cuando alcanzó la instancia de cuartos de final.',
                'grupo' => 7
            ],
            //Grupo H
            [
                'nombre' => 'PORTUGAL',
                'imagen' => '/images/selecciones/portugal.jpg',
                'descripcion' => 'Los últimos tres Mundiales terminaron con sabor a decepción para Portugal, eliminados por España y Uruguay en octavos de final y sin poder superar la fase de grupos en Brasil 2014. El material que tienen es suficiente como para soñar con llegar a lo más alto: por algo en los últimos tiempos ganaron una Eurocopa y una edición de la Liga de Naciones.',
                'grupo' => 8
            ],
            [
                'nombre' => 'GHANA',
                'imagen' => '/images/selecciones/ghana.jpg',
                'descripcion' => 'La selección de Ghana nunca había participado en la fase final de una Copa del Mundo de la FIFA hasta que lograron clasificarse para el Mundial de Alemania 2006. Luego, participaron en Sudáfrica 2010 y Brasil 2014 con lo cual han logrado participar en 3 mundiales seguidos. En el Mundial de Sudáfrica 2010, Ghana alcanzó la «proeza» para equipos africanos de llegar a cuartos de final.',
                'grupo' => 8
            ],
            [
                'nombre' => 'URUGUAY',
                'imagen' => '/images/selecciones/uruguay.jpg',
                'descripcion' => 'El técnico Diego Alonso se hizo cargo de la plantilla que aún tiene a tres jugadores como pilares fundamentales: Diego Godín, Luis Suárez y Edinson Cavani. Los tres estuvieron en aquella mágica presentación en Sudáfrica 2010 en la que llegaron hasta semifinales. Hoy en día, la juventud de Federico Valverde, Ronald Araújo y Rodrigo Bentancur se suman a esta experiencia para hacer un plantel de mucho equilibrio, aunque frontal y agerrido defensivamente; como tiene acostumbrado Uruguay a sus seguidores.',
                'grupo' => 8
            ],
            [
                'nombre' => 'COREA DEL SUR',
                'imagen' => '/images/selecciones/coreadelsur.jpg',
                'descripcion' => 'El mayor logro de su historia ha sido llegar hasta semifinales en la Copa Mundial de Fútbol de 2002 en la que participó bajo anfitrión junto con Japón, obteniendo el 4.º puesto, lo que la convierte junto con la selección de los Estados Unidos en las selecciones fuera de la CONMEBOL y la UEFA que más lejos ha llegado en un mundial. Ha logrado clasificarse diez veces a la Copa Mundial de Fútbol y es la selección asiática que más veces ha asistido al Mundial.',
                'grupo' => 8
            ],
        ];

        DB::table('equipos')->insert($equipos);
    }
}
