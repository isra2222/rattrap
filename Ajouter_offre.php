<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Tinkièt'</title>
        <link rel="shortcut icon" href="Image/logo.png"/>
        <link rel="stylesheet" href="assets/style_ajouter_offre.css">
    </head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>

        <div id="tableau">

            <span id="titre">
                Ajouter une offre de stage
            </span>

            <div class="renseignement">

                <input type="text" id="uname" name="nom" placeholder="Nom de l'offre" size="50"/>
            </div>

            <div class="espace">

                <select id="pays" onchange="populateCities()">
                    <option value="">Sélectionnez un pays</option>
                    <option value="Albanie">Albanie</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Andorre">Andorre</option>
                    <option value="Autriche">Autriche</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Bélarus">Bélarus</option>
                    <option value="BosnieHerzégovine">Bosnie-Herzégovine</option>
                    <option value="Bulgarie">Bulgarie</option>
                    <option value="Chypre">Chypre</option>
                    <option value="Croatie">Croatie</option>
                    <option value="Danemark">Danemark</option>
                    <option value="Espagne">Espagne</option>
                    <option value="Estonie">Estonie</option>
                    <option value="Finlande">Finlande</option>
                    <option value="France">France</option>
                    <option value="Grèce">Grèce</option>
                    <option value="Hongrie">Hongrie</option>
                    <option value="Irlande">Irlande</option>
                    <option value="Islande">Islande</option>
                    <option value="Italie">Italie</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Lettonie">Lettonie</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lituanie">Lituanie</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="MacédoineDuNord">Macédoine du Nord</option>
                    <option value="Malte">Malte</option>
                    <option value="Moldavie">Moldavie</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Monténégro">Monténégro</option>
                    <option value="Norvège">Norvège</option>
                    <option value="PaysBas">Pays-Bas</option>
                    <option value="Pologne">Pologne</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Roumanie">Roumanie</option>
                    <option value="RoyaumeUni">Royaume-Uni</option>
                    <option value="Russie">Russie</option>
                    <option value="SaintMartin">Saint-Martin</option>
                    <option value="Serbie">Serbie</option>
                    <option value="Slovaquie">Slovaquie</option>
                    <option value="Slovénie">Slovénie</option>
                    <option value="Suède">Suède</option>
                    <option value="Suisse">Suisse</option>
                    <option value="Tchéquie">Tchéquie</option>
                    <option value="Turquie">Turquie</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="Vatican">Vatican</option>
                </select>
                <select id="villes">
                    <option value="">Sélectionnez d'abord un pays</option>
                </select>

                <script>
                    const citiesByCountry = {
                        Albanie: ["Ballsh", "Bajram Curri", "Berat", "Bilisht", "Burrel", "Bulqizë", "Delvinë", "Durrës", "Elbasan", "Ersekë", "Fier", "Fushë-Krujë", "Gramsh", "Gjirokastër", "Himarë", "Kavajë", "Këlcyrë", "Kërrabë", "Korçë", "Koplik", "Krujë", "Kukës", "Lac", "Lezhë", "Libohovë", "Librazhd", "Lushnjë", "Maliq", "Memaliaj", "Orikum", "Paskuqan", "Patos", "Përmet", "Peqin", "Peshkopi", "Poliçan", "Pogradec", "Rrëshen", "Roskovec", "Rrogozhinë", "Sarandë", "Selenicë", "Shkodër", "Tepelenë", "Tirana", "Vlorë"],
                        Allemagne: ["Aix-la-Chapelle", "Augsbourg", "Berlin", "Bielefeld", "Bochum", "Bonn", "Braunschweig", "Brême", "Cologne", "Chemnitz", "Dortmund", "Dresde", "Duisbourg", "Düsseldorf", "Erfurt", "Essen", "Fribourg-en-Brisgau", "Gelsenkirchen", "Hagen", "Halle (Saale)", "Hambourg", "Hamm", "Hanovre", "Heidelberg", "Kassel", "Karlsruhe", "Kiel", "Krefeld", "Leipzig", "Leverkusen", "Ludwigshafen", "Lübeck", "Magdebourg", "Mannheim", "Mayence", "Mönchengladbach", "Munich", "Mülheim an der Ruhr", "Münster", "Nuremberg", "Oberhausen", "Oldenbourg", "Osnabrück", "Potsdam", "Rostock", "Saarbrücken", "Solingen", "Stuttgart", "Wiesbaden", "Wuppertal"],
                        Andorre: ["Aixirivall", "Aixovall", "Aldosa", "Aldosa de Canillo", "Andorre-la-Vieille", "Anyós", "Arinsal", "Bixessarri", "Canillo", "Certers", "El Pas de la Casa", "Encamp", "Escaldes-Engordany", "Fontaneda", "Juberri", "La Cortinada", "La Massana", "Les Escaldes", "Llorts", "Llumeneres", "Nagol", "Ordino", "Pas de la Casa", "Ransol", "Sant Julià de Lòria", "Santa Coloma", "Sispony", "Vila"],
                        Autriche: ["Amstetten", "Ansfelden", "Bad Ischl", "Bad Vöslau", "Baden bei Wien", "Bludenz", "Braunau am Inn", "Bregenz", "Bruck an der Mur", "Dornbirn", "Eisenstadt", "Feldkirch", "Feldkirchen in Kärnten", "Graz", "Götzis", "Hall in Tirol", "Hallein", "Hohenems", "Innsbruck", "Kapfenberg", "Klagenfurt", "Klosterneuburg", "Knittelfeld", "Krems an der Donau", "Kufstein", "Leoben", "Leonding", "Linz", "Lustenau", "Marchtrenk", "Perchtoldsdorf", "Rankweil", "Ried im Innkreis", "Salzbourg", "Sankt Veit an der Glan", "Saalfelden", "Schwechat", "Steyr", "Stockerau", "Telfs", "Ternitz", "Traiskirchen", "Traun", "Tulln", "Villach", "Vienne", "Waidhofen an der Ybbs", "Wals-Siezenheim", "Wels", "Wolfsberg", "Wörgl"],
                        Belgique: ["Alost", "Anvers", "Beveren", "Brée", "Bruges", "Bruxelles", "Charleroi", "Courtrai", "Dendermonde", "Eeklo", "Evergem", "Gand", "Genk", "Harelbeke", "Hasselt", "Heist-op-den-Berg", "Helchteren", "Herentals", "Herk-de-Stad", "Herstal", "Ieper", "Ixelles", "La Louvière", "Liège", "Lierre", "Louvain", "Malines", "Marche-en-Famenne", "Mons", "Mortsel", "Mouscron", "Namur", "Ninove", "Ostende", "Peer", "Rixensart", "Roulers", "Saint-Nicolas", "Saint-Trond", "Seraing", "Tournai", "Uccle", "Verviers", "Vilvorde", "Wavre", "Waregem"],
                        Bélarus: ["Asipovichy", "Babrouïsk", "Baranavitchy", "Brest", "Byaroza", "Bykhaw", "Dubrovno", "Dzyarzhynsk", "Gomel", "Haradok", "Hrodna", "Kalinkavitchy", "Klimavichy", "Kobryn", "Krychaw", "Lida", "Maladetchna", "Malaryta", "Mazyr", "Maryina Horka", "Moguilev", "Molodechno", "Navapolatsk", "Novopolotsk", "Orcha", "Pastavy", "Pinsk", "Polotsk", "Rahachow", "Rechytsa", "Salihorsk", "Shchuchyn", "Shklow", "Slutsk", "Smalyavichy", "Smarhon", "Stolin", "Stowbtsy", "Svetlahorsk", "Vawkavysk", "Vileika", "Vitebsk", "Zhlobin", "Zhodzina"],
                        BosnieHerzégovine: ["Banja Luka", "Bihać", "Bijeljina", "Bosanska Krupa", "Brčko", "Bugojno", "Cazin", "Čapljina", "Čitluk", "Doboj", "Derventa", "Goražde", "Gračanica", "Gradačac", "Istočno Sarajevo", "Jajce", "Kakanj", "Kiseljak", "Konjic", "Kozarska Dubica", "Livno", "Lukavac", "Modriča", "Mostar", "Novi Travnik", "Orašje", "Pale", "Prijedor", "Sanski Most", "Sarajevo", "Srebrenik", "Tešanj", "Tomislavgrad", "Travnik", "Trebinje", "Tuzla", "Velika Kladuša", "Vitez", "Visoko", "Zenica", "Široki Brijeg", "Žabljak", "Žepče", "Živinice", "Zavidovići"],
                        Bulgarie: ["Asenovgrad", "Bansko", "Berkovitsa", "Blagoevgrad", "Bourgas", "Choumen", "Devnya", "Dimitrovgrad", "Dobritch", "Dupnitsa", "Gabrovo", "Gorna Oryahovitsa", "Gotse Delchev", "Haskovo", "Karnobat", "Kazanlak", "Karlovo", "Kyustendil", "Lovech", "Montana", "Nova Zagora", "Pazardjik", "Pernik", "Petrich", "Pleven", "Plovdiv", "Popovo", "Radnevo", "Razgrad", "Rousse", "Samokov", "Sevlievo", "Silistra", "Sliven", "Sofia", "Stara Zagora", "Svishtov", "Svilengrad", "Targovichté", "Varna", "Veliko Tarnovo", "Velingrad", "Vidin", "Vratsa", "Yambol"],
                        Chypre: ["Agios Dometios", "Agros", "Alambra", "Anglisides", "Anoyira", "Aradippou", "Athalassa", "Athienou", "Ayia Napa", "Dali", "Dherynia", "Deryneia", "Episkopi", "Engomi", "Famagouste", "Géri", "Kaimakli", "Kato Drys", "Kato Polemidia", "Kiti", "Klirou", "Kyrenia", "Lakatamia", "Larnaca", "Latsia", "Lefka", "Limassol", "Livadia", "Lysi", "Morphou", "Nicosie", "Pano Lefkara", "Paralimni", "Paphos", "Peristerona", "Peyia", "Polis", "Protaras", "Pyrga", "Strovolos", "Tseri", "Trachoni", "Tremetousia", "Xylophaghou", "Ypsonas"],
                        Croatie: ["Belišće", "Bjelovar", "Cakovec", "Daruvar", "Dubrovnik", "Duga Resa", "Đakovo", "Ivanec", "Karlovac", "Knin", "Koprivnica", "Krapina", "Kutina", "Makarska", "Metković", "Nova Gradiška", "Novska", "Osijek", "Omiš", "Opatija", "Petrinja", "Požega", "Ploče", "Pula", "Rijeka", "Samobor", "Sisak", "Slavonski Brod", "Split", "Šibenik", "Trogir", "Umag", "Valpovo", "Varaždin", "Vinkovci", "Virovitica", "Vodice", "Vrbovec", "Vrbovsko", "Vukovar", "Vukovar", "Zaprešić", "Zadar", "Zagreb"],
                        Danemark: ["Aalborg", "Aarhus", "Copenhague", "Ebeltoft", "Esbjerg", "Faaborg", "Fredericia", "Frederikshavn", "Frederikssund", "Grenaa", "Hillerød", "Hjørring", "Horsens", "Helsingør", "Herning", "Holbæk", "Holstebro", "Kerteminde", "Kolding", "Køge", "Lyngby-Taarbæk", "Middelfart", "Nakskov", "Næstved", "Nyborg", "Odder", "Odense", "Randers", "Ringsted", "Roskilde", "Rønne", "Silkeborg", "Skanderborg", "Skive", "Slagelse", "Sønderborg", "Stege", "Svendborg", "Taastrup", "Thisted", "Vejen", "Vejle", "Viborg", "Vordingborg", "Hørsholm"],
                        Espagne: ["Alicante", "Alcalá de Henares", "Albacete", "Alcorcón", "Almería", "Badajoz", "Badalona", "Barcelone", "Bilbao", "Burgos", "Cádiz", "Cartagena", "Castellón de la Plana", "Cordoue", "Elche", "Fuenlabrada", "Getafe", "Gijón", "Granada", "Huelva", "Hospitalet de Llobregat", "Lérida", "La Corogne", "León", "Logroño", "Madrid", "Malaga", "Murcie", "Móstoles", "Oviedo", "Palma", "Pamplona", "Salamanque", "San Sebastián", "Santa Coloma de Gramenet", "Saragosse", "Santander", "Sabadell", "Séville", "Tarragone", "Terrassa", "Valence", "Valladolid", "Vigo", "Vitoria-Gasteiz"],
                        Estonie: ["Abja-Paluoja", "Antsla", "Haapsalu", "Jõgeva", "Jõhvi", "Kallaste", "Karksi-Nuia", "Keila", "Kehra", "Kilingi-Nõmme", "Kohtla-Järve", "Kunda", "Kuressaare", "Lihula", "Loksa", "Maardu", "Mustvee", "Narva", "Otepää", "Paldiski", "Paide", "Pärnu", "Rakvere", "Rapla", "Saue", "Sillamäe", "Sindi", "Suure-Jaani", "Tallinn", "Tartu", "Tapa", "Tõrva", "Tõstamaa", "Toila", "Türi", "Valga", "Viljandi", "Võhma", "Võru"],
                        Finlande: ["Alajärvi", "Ekenäs", "Espoo", "Hamina", "Hämeenlinna", "Helsinki", "Hollola", "Hyvinkää", "Jakobstad", "Järvenpää", "Joensuu", "Jyväskylä", "Kajaani", "Kemi", "Karis", "Kirkkonummi", "Kokkola", "Kotka", "Kouvola", "Kuopio", "Lahti", "Lappeenranta", "Lohja", "Mikkeli", "Nurmijärvi", "Oulu", "Pieksämäki", "Pori", "Porvoo", "Raahe", "Rauma", "Riihimäki", "Rovaniemi", "Salo", "Savonlinna", "Seinäjoki", "Tampere", "Tornio", "Turku", "Tuusula", "Vaasa", "Vantaa", "Ylöjärvi"],
                        France: ["Aix-en-Provence", "Amiens", "Angers", "Argenteuil", "Asnières-sur-Seine", "Besançon", "Bordeaux", "Boulogne-Billancourt", "Brest", "Caen", "Clermont-Ferrand", "Colombes", "Courbevoie", "Cergy", "Dijon", "Fort-de-France", "Grenoble", "Le Havre", "Le Mans", "Lille", "Limoges", "Lyon", "Marseille", "Metz", "Montpellier", "Montreuil", "Mulhouse", "Nanterre", "Nantes", "Nice", "Nîmes", "Orléans", "Perpignan", "Paris", "Poitiers", "Reims", "Rennes", "Rouen", "Saint-Denis", "Saint-Étienne", "Saint-Paul", "Strasbourg", "Toulon", "Toulouse", "Tours", "Versailles", "Villeurbanne"],
                        Grèce: ["Agios Nikolaos", "Agrinio", "Alexandroupoli", "Almyros", "Amaliada", "Amfilochia", "Arta", "Athènes", "Chalcis", "Chania", "Chios", "Corinth", "Drama", "Edessa", "Elefsina", "Florina", "Heraklion", "Héraklion", "Ioannina", "Kalamata", "Katerini", "Kavala", "Kilkis", "Komotini", "Kos", "Kozani", "Larissa", "Lamia", "Livadeia", "Megara", "Mytilene", "Nafplio", "Naousa", "Orestiada", "Patras", "Peraia", "Polikastro", "Ptolemaida", "Pyrgos", "Rhodes", "Serres", "Sparta", "Syros", "Thessalonique", "Tripoli", "Trikala", "Volos", "Xanthi"],
                        Hongrie: ["Ajka", "Baja", "Békéscsaba", "Budapest", "Cegléd", "Debrecen", "Dunakeszi", "Dunaújváros", "Eger", "Esztergom", "Győr", "Gyula", "Gödöllő", "Hajdúböszörmény", "Hatvan", "Hódmezővásárhely", "Kaposvár", "Kecskemét", "Kiskunfélegyháza", "Kiskunhalas", "Kecskemét", "Miskolc", "Mosonmagyaróvár", "Nagykanizsa", "Nagykőrös", "Nyíregyháza", "Orosháza", "Pápa", "Pécs", "Salgótarján", "Siófok", "Sopron", "Szigetszentmiklós", "Szeged", "Szekszárd", "Szentes", "Székesfehérvár", "Szolnok", "Szombathely", "Szentes", "Székesfehérvár", "Szeged", "Szekszárd", "Szolnok", "Szombathely", "Tatabánya", "Vác", "Várpalota", "Veszprém", "Zalaegerszeg"],
                        Irlande: ["Arklow", "Ashbourne", "Athlone", "Balbriggan", "Ballina", "Bray", "Carlow", "Carrick-on-Shannon", "Carrigaline", "Castlebar", "Celbridge", "Clonmel", "Cobh", "Cork", "Drogheda", "Dublin", "Dungarvan", "Dundalk", "Ennis", "Galway", "Gorey", "Greystones", "Kells", "Killarney", "Laytown", "Leixlip", "Letterkenny", "Limerick", "Mallow", "Malahide", "Maynooth", "Midleton", "Mullingar", "Naas", "Navan", "Newbridge", "Portlaoise", "Roscommon", "Skibbereen", "Sligo", "Swords", "Tralee", "Tramore", "Tullamore", "Waterford", "Westport", "Wexford"],
                        Islande: ["Akranes", "Akureyri", "Árborg", "Borgarnes", "Dalvík", "Djúpivogur", "Egilsstaðir", "Eyrarbakki", "Fjarðabyggð", "Flateyri", "Garðabær", "Garður", "Grundarfjörður", "Hafnarfjörður", "Hafnarfjörður", "Höfn", "Húsavík", "Hvammstangi", "Keflavík", "Kópavogur", "Mosfellsbær", "Neskaupstaður", "Ólafsfjörður", "Ólafsvík", "Patreksfjörður", "Reykjavik", "Reykjanesbær", "Reykjahlíð", "Sauðárkrókur", "Selfoss", "Seltjarnarnes", "Skagaströnd", "Stykkishólmur", "Vík í Mýrdal", "Vestmannaeyjar", "Vopnafjörður"],
                        Italie: ["Alessandria", "Ancône", "Arezzo", "Barletta", "Bari", "Belluno", "Bergame", "Bologne", "Bolzano", "Brescia", "Brindisi", "Cagliari", "Carrare", "Catane", "Cesena", "Chieti", "Côme", "Crémone", "Cuneo", "Foggia", "Forlì", "Frosinone", "Gênes", "La Spezia", "Lecce", "Livourne", "Lucques", "Mantoue", "Massa", "Matera", "Messine", "Milan", "Modène", "Monza", "Naples", "Novare", "Padoue", "Palerme", "Parme", "Pescara", "Piacenza", "Pise", "Plaisance", "Prato", "Ravenne", "Reggio de Calabre", "Reggio Émilie", "Rimini", "Rome", "Salerne", "Sassari", "Sienne", "Syracuse", "Tarente", "Tarante", "Terni", "Tivoli", "Trévise", "Trieste", "Turin", "Udine", "Venise", "Vérone", "Vicence", "Viterbe"],
                        Kazakhstan: [ "Aksou", "Aktau", "Aktobe", "Almaty", "Arkalyk", "Astana (Nur-Sultan)", "Aqtöbe", "Atyraou", "Baïkonour", "Balqash", "Chimkent (Shymkent)", "Dzhezkazgan (Zhezkazgan)", "Ekibastouz", "Gostivar", "Karaganda", "Kapchagai", "Kokshetau", "Kostanay", "Kyzylorda", "Kökshetau", "Kyzyl-Orda", "Kyzylorda", "Maïkoude", "Ménélik", "Mérirtaou", "Nour-Soultan (Nur-Sultan)", "Oral", "Oskemen (Ust-Kamenogorsk)", "Oural", "Pavlodar", "Petropavl", "Ridder", "Semey", "Semeï", "Shymkent", "Soroko", "Stepnogorsk", "Taraz", "Temirtau", "Turkestan", "Ust-Kamenogorsk", "Zhezkazgan"],
                        Lettonie: ["Aizkraukle", "Balvi", "Bauska", "Cēsis", "Daugavpils", "Dobele", "Gulbene", "Jelgava", "Jūrmala", "Krāslava", "Kuldīga", "Liepāja", "Limbaži", "Ludza", "Madona", "Ogre", "Preiļi", "Rēzekne", "Rīga", "Saldus", "Talsi", "Tukums", "Valmiera", "Ventspils"],
                        Liechtenstein: ["Balzers", "Bendern", "Eschen", "Gamprin", "Mauren", "Planken", "Ruggell", "Schaan", "Schaanwald", "Schellenberg", "Triesen", "Triesenberg", "Vaduz", "Wanga"],
                        Lituanie: ["Alytus", "Anykščiai", "Biržai", "Druskininkai", "Elektrėnai", "Ežerėlis", "Garliava", "Gargždai", "Grigiškės", "Jonava", "Joniškis", "Jurbarkas", "Kaišiadorys", "Kaunas", "Kazlų Rūda", "Kėdainiai", "Kelmė", "Kretinga", "Kupiškis", "Lazdijai", "Lentvaris", "Mažeikiai", "Marijampolė", "Naujoji Akmenė", "Palanga", "Panevėžys", "Plungė", "Prienai", "Radviliškis", "Rokiškis", "Šakiai", "Šiauliai", "Šilutė", "Švenčionys", "Tauragė", "Telšiai", "Trakai", "Ukmergė", "Utena", "Varėna", "Vilkaviškis", "Visaginas"],
                        Luxembourg: ["Belvaux", "Bertrange", "Bettembourg", "Diekirch", "Differdange", "Dudelange", "Echternach", "Esch-sur-Alzette", "Ettelbruck", "Grevenmacher", "Hesperange", "Kayl", "Luxembourg", "Mersch", "Pétange", "Remich", "Rumelange", "Sanem", "Schifflange", "Strassen", "Vianden", "Wiltz"],
                        MacédoineDuNord: ["Aračinovo", "Berovo", "Bitola", "Bogovinje", "Bosilovo", "Brvenica", "Centar", "Centar Župa", "Čaška", "Čegrane", "Češinovo-Obleševo", "Čučer-Sandevo", "Debar", "Debarca", "Delčevo", "Demir Hisar", "Demir Kapija", "Dojran", "Dolneni", "Drugovo", "Gazi Baba", "Gazi Baba", "Gevgelija", "Gjorče Petrov", "Gjorče Petrov", "Gostivar", "Gradsko", "Ilinden", "Jegunovce", "Kavadarci", "Kičevo", "Kisela Voda", "Kocani", "Konce", "Kratovo", "Kriva Palanka", "Krivogaštani", "Kruševo", "Kumanovo", "Lozovo", "Makedonska Kamenica", "Makedonski Brod", "Mavrovo i Rostuša", "Mogila", "Negotino", "Negotino-Poloska", "Novatsi", "Novo Selo", "Ohrid", "Oslomej", "Pehčevo", "Petrovec", "Plasnica", "Podareš", "Prilep", "Probištip", "Radoviš", "Rankovce", "Resen", "Rosoman", "Saraj", "Sopište", "Staro Nagoričane", "Struga", "Strumica", "Studeničani", "Sveti Nikole", "Tearce", "Tetovo", "Valandovo", "Vasilevo", "Veles", "Vevčani", "Vinica", "Vraneštica", "Vrapčište", "Zajas", "Zelenikovo", "Zrnovci"],
                        Malte: ["Attard", "Balzan", "Birgu", "Birkirkara", "Birżebbuġa", "Cospicua", "Dingli", "Fgura", "Floriana", "Fontana", "Għajnsielem", "Għarb", "Gżira", "Gudja", "Gżira", "Għargħur", "Għasri", "Għaxaq", "Ħamrun", "Iklin", "Isla", "Kalkara", "Kercem", "Kirkop", "Lija", "Luqa", "Marsa", "Marsaskala", "Marsaxlokk", "Mellieħa", "Mosta", "Mqabba", "Msida", "Mtarfa", "Munxar", "Nadur", "Naxxar", "Paola", "Pembroke", "Pieta", "Qala", "Qormi", "Qrendi", "Rabat", "Safi", "Saint Julian's", "Saint Lawrence", "Saint Paul's Bay", "Saint Venera", "Sannat", "San Pawl il-Baħar", "Santa Luċija", "Santa Venera", "Senglea", "Siġġiewi", "Sliema", "Swieqi", "Ta Xbiex", "Tarxien", "Valletta", "Xagħra", "Xewkija", "Xgħajra", "Żabbar", "Żebbuġ", "Żejtun", "Żurrieq"],
                        Moldavie: ["Chisinau", "Tiraspol", "Bălți", "Bender", "Rîbnița", "Cahul", "Ungheni", "Soroca", "Orhei", "Comrat", "Strășeni", "Ceadîr-Lunga", "Căușeni", "Drochia", "Edineț", "Cimișlia", "Leova", "Nisporeni", "Florești", "Slobozia", "Fălești", "Căinari", "Călărași", "Anenii Noi", "Dondușeni", "Sîngerei", "Cricova", "Hîncești", "Basarabeasca", "Ștefan Vodă", "Grigoriopol", "Criuleni", "Telenești", "Rîșcani", "Taraclia", "Camenca", "Hîrbovăț", "Ocnița", "Glodeni", "Dubăsari", "Rezina", "Vulcănești", "Telenesti", "Drochia"],
                        Monaco: ["Monaco", "Monte-Carlo", "La Condamine", "Fontvieille", "Moneghetti", "Larvotto", "Saint-Roman", "Jardin Exotique", "La Colle", "Les Révoires", "Plati", "Port Hercule", "Saint Michel", "La Rousse", "La Source", "La Turbie", "Roquebrune-Cap-Martin", "Cap Ail", "Beausoleil"],
                        Monténégro: ["Podgorica", "Nikšić", "Pljevlja", "Budva", "Herceg Novi", "Bar", "Berane", "Bijelo Polje", "Cetinje", "Rožaje", "Ulcinj", "Tivat", "Kotor", "Danilovgrad", "Žabljak", "Mojkovac", "Plužine", "Plav", "Andrijevica", "Petnjica", "Kolašin", "Šavnik", "Gusinje", "Rozaje"],
                        Norvège: ["Oslo", "Bergen", "Stavanger", "Trondheim", "Drammen", "Fredrikstad", "Kristiansand", "Sandnes", "Tromsø", "Sarpsborg", "Skien", "Ålesund", "Sandefjord", "Haugesund", "Tønsberg", "Moss", "Porsgrunn", "Bodø", "Arendal", "Hamar", "Larvik", "Halden", "Askøy", "Molde", "Kongsberg", "Harstad", "Lillehammer", "Gjøvik", "Mo i Rana", "Narvik"],
                        PaysBas: ["Amsterdam", "Rotterdam", "La Haye (Den Haag)", "Utrecht", "Eindhoven", "Tilburg", "Groningue", "Almere", "Bréda", "Nimègue", "Enschede", "Haarlem", "Arnhem", "Zaanstad", "Amersfoort", "Apeldoorn", "s-Hertogenbosch", "Hoofddorp", "Maastricht", "Leiden", "Dordrecht", "Zwolle", "Deventer", "Sittard-Geleen", "Helmond", "Vénlo", "Leeuwarden", "Alkmaar", "Roermond", "Purmerend", "Oss", "Schiedam", "Spijkenisse", "Vlaardingen"],
                        Pologne: ["Varsovie", "Cracovie", "Łódź", "Wrocław", "Poznań", "Gdańsk", "Szczecin", "Bydgoszcz", "Lublin", "Katowice", "Białystok", "Gdynia", "Częstochowa", "Sosnowiec", "Radom", "Kielce", "Gliwice", "Toruń", "Zielona Góra", "Rzeszów", "Olsztyn", "Bielsko-Biała", "Ruda Śląska", "Rybnik", "Tychy", "Dąbrowa Górnicza", "Płock", "Wałbrzych", "Opole", "Gorzów Wielkopolski", "Tarnów", "Legnica", "Chorzów", "Bytom", "Zabrze", "Słupsk", "Leszno", "Włocławek", "Świdnica", "Elbląg", "Tomaszów Mazowiecki", "Chełm", "Pruszków", "Jaworzno", "Jelenia Góra"],
                        Portugal: ["Lisbonne", "Porto", "Braga", "Coimbra", "Setúbal", "Funchal", "Évora", "Faro", "Portimão", "Aveiro", "Vila Nova de Gaia", "Amadora", "Guimarães", "Odivelas", "Leiria", "Barreiro", "Maia", "Vila Nova de Famalicão", "Santa Maria da Feira", "Rio Tinto", "Loures", "Matosinhos", "Póvoa de Varzim", "Queluz", "Sintra", "Sesimbra", "Vila Franca de Xira", "Ponta Delgada", "Viseu", "São João da Madeira", "Almada", "Torres Vedras", "Valongo", "Vila Real", "Beja", "Bragança", "Sines", "Chaves", "Albufeira", "Gondomar"],
                        Roumanie: ["Bucarest", "Cluj-Napoca", "Timișoara", "Iași", "Constanța", "Craiova", "Brașov", "Galați", "Ploiești", "Oradea", "Brăila", "Arad", "Pitești", "Sibiu", "Bacău", "Târgu Mureș", "Baia Mare", "Buzău", "Botoșani", "Satu Mare", "Râmnicu Vâlcea", "Suceava", "Piatra Neamț", "Drobeta-Turnu Severin", "Târgu Jiu", "Tulcea", "Târgoviște", "Alba Iulia", "Giurgiu", "Bistrița", "Reșița", "Slatina", "Focșani", "Vaslui", "Călărași", "Hunedoara", "Slobozia", "Ploiesti", "Pitesti", "Sibiu", "Bacau", "Targu Mures", "Baia Mare", "Buzau", "Botosani", "Satu Mare"],
                        RoyaumeUni: ["Londres", "Manchester", "Birmingham", "Glasgow", "Liverpool", "Newcastle upon Tyne", "Sheffield", "Leeds", "Bristol", "Édimbourg", "Belfast", "Cardiff", "Nottingham", "Southampton", "Leicester", "Coventry", "Bradford", "Aberdeen", "Plymouth", "Stoke-on-Trent", "Wolverhampton", "Derby", "Swansea", "Salford", "Portsmouth", "Milton Keynes", "Reading", "Northampton", "Luton", "Swindon", "Warrington", "Dudley", "York", "Stockport", "Newport", "Preston", "Norwich", "Chester", "Cambridge", "Peterborough", "Dundee", "Oxford", "Poole", "Gloucester"],
                        Russie: ["Moscou", "Saint-Pétersbourg", "Novossibirsk", "Ekaterinbourg", "Nijni Novgorod", "Kazan", "Tcheliabinsk", "Omsk", "Samara", "Rostov-sur-le-Don", "Oufa", "Krasnoïarsk", "Perm", "Voronej", "Volgograd", "Saratov", "Krasnodar", "Tolyatti", "Barnaoul", "Izhevsk", "Oulan-Oude", "Irkoutsk", "Iaroslavl", "Toula", "Vladivostok", "Mahatchkala", "Kaliningrad", "Khabarovsk", "Koursk", "Nijni Novgorod", "Kazan", "Tcheliabinsk", "Omsk", "Samara", "Rostov-sur-le-Don", "Oufa", "Krasnoïarsk", "Perm", "Voronej", "Volgograd", "Saratov", "Krasnodar", "Tolyatti", "Barnaoul", "Izhevsk", "Oulan-Oude", "Irkoutsk"],
                        MaintMartin: ["Marigot", "Grand-Case", "Philipsburg", "Lowlands", "Cul de Sac", "Sandy Ground", "Rambaud", "Colombier", "Orleans", "South Reward", "Hope Estate", "French Quarter", "Cole Bay", "Saint James", "Terres Basses", "Les Terres Basses", "Concordia", "Marigot", "Grand-Case", "Philipsburg", "Lowlands", "Cul de Sac", "Sandy Ground", "Rambaud", "Colombier", "Orleans", "South Reward", "Hope Estate", "French Quarter", "Cole Bay", "Saint James", "Terres Basses", "Les Terres Basses", "Concordia"],
                        Serbie: ["Belgrade", "Novi Sad", "Niš", "Kragujevac", "Subotica", "Zrenjanin", "Pančevo", "Čačak", "Novi Pazar", "Kraljevo", "Leskovac", "Smederevo", "Valjevo", "Kruševac", "Šabac", "Užice", "Požarevac", "Zajecar", "Vranje", "Bor", "Jagodina", "Sombor", "Cacak", "Novi Pazar", "Kraljevo", "Leskovac", "Smederevo", "Valjevo", "Krusevac", "Sabac", "Uzice", "Pozarevac", "Zajecar", "Vranje", "Bor", "Jagodina", "Sombor"],
                        Slovaquie: ["Bratislava", "Košice", "Prešov", "Žilina", "Nitra", "Banská Bystrica", "Trnava", "Martin", "Trenčín", "Poprad", "Prievidza", "Zvolen", "Považská Bystrica", "Michalovce", "Spišská Nová Ves", "Komárno", "Levice", "Humenné", "Liptovský Mikuláš", "Nové Zámky", "Bardejov", "Dolný Kubín", "Senica", "Pezinok", "Malacky", "Dunajská Streda", "Skalica", "Senec", "Trnava", "Martin", "Trencin", "Poprad", "Prievidza", "Zvolen", "Povazska Bystrica", "Michalovce", "Spisska Nova Ves", "Komarno", "Levice", "Humenne", "Liptovsky Mikulas", "Nove Zamky", "Bardejov"],
                        Slovénie: ["Ljubljana", "Maribor", "Celje", "Kranj", "Koper", "Velenje", "Novo Mesto", "Ptuj", "Trbovlje", "Kamnik", "Jesenice", "Nova Gorica", "Domžale", "Škofja Loka", "Izola", "Kuzma", "Radenci", "Prevalje", "Hrastnik", "Murska Sobota", "Slovenj Gradec", "Tolmin", "Grosuplje", "Slovenske Konjice", "Litija", "Ljutomer", "Medvode", "Ormož", "Lenart v Slovenskih goricah", "Sežana", "Ajdovščina", "Menges", "Kamnik", "Jesenice", "Nova Gorica", "Domzale", "Skofja Loka", "Izola", "Kuzma", "Radenci", "Prevalje", "Hrastnik", "Murska Sobota", "Slovenj Gradec", "Tolmin", "Grosuplje", "Slovenske Konjice", "Litija", "Ljutomer"],
                        Suède: ["Stockholm", "Göteborg", "Malmö", "Uppsala", "Linköping", "Västerås", "Örebro", "Norrköping", "Helsingborg", "Jönköping", "Umeå", "Lund", "Gävle", "Borås", "Eskilstuna", "Södertälje", "Karlstad", "Täby", "Växjö", "Halmstad", "Sundsvall", "Luleå", "Trollhättan", "Östersund", "Borlänge", "Falun", "Tumba", "Kalmar", "Sundbyberg", "Skövde", "Södertälje", "Karlstad", "Taby", "Vaxjo", "Halmstad", "Sundsvall", "Lulea", "Trollhattan", "Ostersund", "Borlange", "Falun", "Tumba", "Kalmar", "Sundbyberg", "Skovde"],
                        Suisse: ["Zurich", "Genève", "Bâle", "Lausanne", "Berne", "Winterthour", "Lucerne", "Saint-Gall", "Lugano", "Bienne", "Thoun", "La Chaux-de-Fonds", "Fribourg", "Schaffhouse", "Vernier", "Neuchâtel", "Uster", "Sion", "Lancy", "Emmen", "Uzwil", "Martigny", "Yverdon-les-Bains", "Köniz", "Montreux", "Frauenfeld", "Langenthal", "Wetzikon", "Rapperswil", "Carouge", "Wil", "Gossau", "Meyrin", "Pratteln", "Zollikon", "Pully", "Hinwil", "Thalwil", "Spiez", "Kreuzlingen", "Dübendorf", "Wallisellen"],
                        Tchéquie: ["Prague", "Brno", "Ostrava", "Plzeň", "Liberec", "Olomouc", "České Budějovice", "Hradec Králové", "Ústí nad Labem", "Pardubice", "Havířov", "Zlín", "Kladno", "Most", "Opava", "Frýdek-Místek", "Karviná", "Jihlava", "Teplice", "Děčín", "Chomutov", "Karlovy Vary", "Jindřichův Hradec", "Prostějov", "Třebíč", "Znojmo", "Přerov", "Česká Lípa", "Tábor"],
                        Turquie: ["Istanbul", "Ankara", "Izmir", "Bursa", "Adana", "Gaziantep", "Konya", "Antalya", "Diyarbakir", "Mersin", "Şanliurfa", "Kayseri", "Samsun", "Denizli", "Çankaya", "Erzurum", "Eskişehir", "Malatya", "Trabzon", "Van", "İzmit", "Manisa", "Batman", "Balikesir", "Sivas", "Adapazari", "Kahramanmaraş", "Gebze", "Aydin", "Tarsus", "Elâziğ", "Trabzon", "Van", "Izmit", "Manisa", "Batman", "Balikesir", "Sivas", "Adapazari", "Kahramanmaras", "Gebze", "Aydin", "Tarsus", "Elazig", "Denizli", "Edirne", "Adiyaman", "Erzincan", "Tokat"],
                        Ukraine: ["Kiev", "Kharkiv", "Lviv", "Odessa", "Dnipro", "Donetsk", "Zaporijia", "Loutsk", "Poltava", "Marioupol", "Mykolaïv", "Sébastopol", "Jytomyr", "Kherson", "Khmelnitski", "Tchernivtsi", "Tcherkassy", "Soumy", "Ternopil", "Kirovohrad", "Vinnytsia", "Rivne", "Ivano-Frankivsk", "Loutsk", "Poltava", "Marioupol", "Mykolaiv", "Sebastopol", "Jitomir", "Kherson", "Khmelnitski", "Tchernivtsi", "Tcherkassy", "Soumy", "Ternopil", "Kirovograd", "Vinnytsia", "Rivne", "Ivano-Frankivsk", "Dnepropetrovsk", "Chernihiv", "Chernihiv", "Khmelnytskyi", "Zhytomyr"],
                        Vatican: ["Vatican City"]
                    };

                    function populateCities(){
                        const selectedCountry = document.getElementById("pays").value;
                        const citiesDropdown = document.getElementById("villes");

                        citiesDropdown.innerHTML = "";

                        const defaultOption = document.createElement("option");
                        defaultOption.text = "Sélectionnez d'abord un pays";
                        citiesDropdown.add(defaultOption);

                        if (selectedCountry){
                            const cities = citiesByCountry[selectedCountry];
                            cities.forEach(city => {
                                const option = document.createElement("option");
                                option.text = city;
                                citiesDropdown.add(option);
                            });
                        }
                    }
                </script>

            </div>

            <div class="renseignement">

                <input type="text" id="ad" name="adresse" placeholder="Adresse de l'entreprise" size="50"/>

                <br> 

            </div>
            
            <div class="mot">

                <span class="dates">Date de publication de l'offre :</span>

            </div>

            <div class="renseignement">
                <input type="date" id="offre" name="publication-offre" value="2024-01-01" min="2024-01-01" max="2034-12-31" />

                <input type="text" id="description" name="description" placeholder="Description de l'offre de stage" size="50" />

            </div>

            <div class="caselongue">
                
                <input type="number" id="caselongue" name="remuneration" placeholder="Rémunération (€)" size="50"/>
            
            </div>

            <div class="mot">

                <span class="dates">Date de début du stage :</span>

                <span class="dates">Date de fin du stage :</span>

            </div>

            <div class="espace">

                <input type="date" id="stage" name="date-stage" value="2024-01-01" min="2024-01-01" max="2034-12-31" />

                <input type="date" id="stage" name="date-stage" value="2024-01-01" min="2024-01-01" max="2034-12-31" />

            </div>

            <div class="renseignement">

                <input type="number" id="caselongue" name="duree-stage" placeholder="Durée du stage (jours)" size="50" />

                <input type="number" id="caselongue" name="place" placeholder="Nombre de places" size="50" />

            </div>

            <div class="espace">

                <select id="promotion">
                    <option value="">Sélectionner la promotion</option>
                    <option value="CPI A1">CPI A1</option>
                    <option value="CPI A2">CPI A2</option>
                    <option value="FISE A3">FISE A3</option>
                    <option value="FISE A4">FISE A4</option>
                    <option value="FISE A5">FISE A5</option>
                </select>

                <select id="specialite" placeholder="Choisir sa spécialité">
                    <option value="">Sélectionner la spécialité</option>
                    <option value="Généraliste">Généraliste</option>
                    <option value="Informatique">Informatique</option>
                    <option value="BTP">BTP</option>
                    <option value="Système Embarqué">Système Embarqué</option>
                </select>
            
            </div>
        </div>

        <?php include 'footer.php'; ?>
        
    </body>
</html>
            
