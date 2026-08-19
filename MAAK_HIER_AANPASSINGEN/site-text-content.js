// ============================================================
// ALLE TEKSTEN VAN DE WEBSITE — GEEN CODE NODIG
// (Foto's beheer je niet hier, maar door ze in de juiste map te zetten —
// zie portfolio/LEES-MIJ.txt in deze map. De "covers"-foto's hieronder zijn
// gewoon een pad naar een bestaande foto.)
//
// Verander hieronder alleen wat er RECHTS van een dubbele punt (:) staat,
// tussen de aanhalingstekens " ". Zet <br> in een tekst als je een regel
// wilt afbreken. Sla dit bestand op en zet het online — geen "build"
// nodig, de browser leest dit bestand direct.
//
// Dit bestand volgt de website zelf: eerst de VOORPAGINA van boven naar
// onder, dan de andere pagina's in de volgorde van het menu.
// ============================================================
const SITE_CONFIG = {

  // ------------------------------------------------------------
  // VOORPAGINA — de 3 kolommetjes met dienst + icoontje, de 2 knoppen
  // eronder, en het "Over mij"-blok met foto helemaal onderaan.
  // ------------------------------------------------------------
  homepage: {
    // 1e kolom: roze hartje-icoontje, linksboven.
    hartIcon: {
      titel: 'Schminken!',
      tekst: 'Creatieve en kleurrijke schmink<br> voor jong en oud.',
    },
    // 2e kolom: paarse bliksem-icoontje, in het midden.
    bliksemIcon: {
      titel: "Glittertattoo's",
      tekst: "Mooie, tijdelijke glittertattoo's<br> in allerlei designs.",
    },
    // 3e kolom: groene ster-icoontje, rechts.
    sterIcon: {
      titel: 'Feestjes & Evenementen',
      tekst:
        'Voor kinderfeestjes, schoolfeesten,<br>markten en andere gelegenheden.',
    },
    // De 2 ronde knoppen onder de 3 voorbeeldfoto's.
    ctaWerk: 'BEKIJK MIJN WERK',
    ctaPrijzen: 'BEKIJK DE PRIJZEN',
    // Het "Over mij"-blok met portretfoto, helemaal onderaan de voorpagina.
    over: {
      titel: 'Hoi, ik ben Sanne!',
      tekst:
        'Mijn naam is Sanne Lek en ik schmink op kinderfeestjes, evenementen en voor bedrijven of winkels in een straal van 30 km rond Hoofddorp.',
    },
  },

  // ------------------------------------------------------------
  // POPUP "WEBSITE IN AANBOUW" — verschijnt bovenop de voorpagina zodra
  // iemand de site opent. Zet actief op false om 'm helemaal uit te
  // zetten (bijv. zodra de site live gaat) zonder verder iets aan te
  // hoeven passen. Een bezoeker die op de knop klikt, ziet 'm daarna
  // niet meer terug (dat onthoudt de browser zelf).
  // ------------------------------------------------------------
  overlay: {
    actief: true,
    titel: 'Website in aanbouw',
    tekst:
      "Deze website is nog in ontwikkeling. Sommige teksten en foto's zijn nog placeholders.",
    knop: 'Ik snap het, ga verder',
  },

  // ------------------------------------------------------------
  // BOVENAAN elke pagina (logo-tekst, "AANVRAAG DOEN"-knop) en
  // ONDERAAN elke pagina (contactgegevens naast het kleine logo).
  // ------------------------------------------------------------
  contact: {
    // Tekst op de ronde knop rechtsboven op elke pagina, en op de knop
    // onder het "Over mij"-blok op de voorpagina.
    callToAction: 'AANVRAAG DOEN',
    // De rest hieronder staat alleen in de footer (onderaan elke pagina).
    tagline: 'Kleur maakt alles leuker!',
    telefoon: '06 – 123456789',
    email: 'info@voorbeeld.nl',
    regio: '30 km rond Hoofddorp',
  },

  // De rondjes met social-media-links in de footer (onderaan elke
  // pagina). Elk badge heeft een titel (tooltip/toegankelijkheid), logo
  // (de 1-3 letters in het rondje), link, en optioneel een kleur voor de
  // achtergrond — zonder kleur wordt het rondje grijs. Een badge weglaten
  // of de hele lijst leeg maken ([]) zorgt dat hij simpelweg niet getoond
  // wordt.
  //
  // Kleur schrijf je als "rgb(rood, groen, blauw)", met 3 getallen van
  // 0 t/m 255 (bijv. "rgb(225, 48, 108)"). Kies een kleur en lees de 3
  // getallen af op https://www.w3schools.com/colors/colors_picker.asp
  // (staat daar onder "RGB").
  socials: [
    {
      titel: 'Instagram',
      logo: 'IG',
      link: 'https://instagram.com/',
      kleur: 'rgb(225, 48, 108)',
    },
    {
      titel: 'Facebook',
      logo: 'FB',
      link: 'https://facebook.com/',
      kleur: 'rgb(24, 119, 242)',
    },
  ],

  // De 4 foto's die als "cover" gebruikt worden op de voorpagina en de
  // prijzenpagina — 3 daarvan zijn gewoon een foto uit een van de
  // portfolio-mapjes, de 4e is de portretfoto. Verander hieronder het pad
  // (rechts van de dubbele punt) als je een andere foto wilt tonen; het
  // pad is altijd relatief aan deze map (MAAK_HIER_AANPASSINGEN/).
  covers: {
    // 1e voorbeeldfoto op de voorpagina, en het roze hartje-kaartje op de prijzenpagina.
    hartIcon: 'portfolio/kwast/cover.jpg',
    // 2e voorbeeldfoto op de voorpagina, en het paarse bliksem-kaartje op de prijzenpagina.
    bliksemIcon: 'portfolio/ster/cover.jpg',
    // 3e voorbeeldfoto op de voorpagina, en het groene ster-kaartje op de prijzenpagina.
    sterIcon: 'portfolio/ballon/cover.jpg',
    // De ronde portretfoto bij "Over mij" onderaan de voorpagina.
    portret: 'portret.png',
  },

  // ------------------------------------------------------------
  // PRIJZEN-PAGINA (via het menu / de knop "BEKIJK DE PRIJZEN")
  // ------------------------------------------------------------
  prijzen: {
    titel: 'Prijzen',
    // 1e kaartje: roze hartje-icoontje.
    hartIcon: {
      titel: 'Schminken',
      prijs: '€ 4,-',
      tekst: 'Placeholder tekst over de schminkprijzen.',
    },
    // 2e kaartje: paarse bliksem-icoontje.
    bliksemIcon: {
      titel: "Glittertattoo's",
      prijs: '€ 5,-',
      tekst: 'Placeholder tekst over de glittertattoo-prijzen.',
    },
    // 3e kaartje: groene ster-icoontje.
    sterIcon: {
      titel: 'Feestjes & evenementen',
      prijs: '€ 6,-',
      tekst: 'Placeholder tekst over de prijzen voor feestjes etc.',
    },
    // De tekst helemaal onderaan de prijzenpagina.
    footnote: 'Neem contact op voor een offerte op maat.',
  },

  // ------------------------------------------------------------
  // "MIJN WERK"-OVERZICHTSPAGINA (via het menu / de knop
  // "BEKIJK MIJN WERK") — titel/intro bovenaan, en de tekst onder elk
  // van de 3 categorieblokken (met een paar voorbeeldfoto's en een link
  // naar de volledige album-pagina van die categorie).
  // ------------------------------------------------------------
  werkOverzicht: {
    titel: 'Mijn werk',
    intro:
      "Een greep uit eerder werk: schminken, glittertattoo's en feestjes & evenementen.",
    schminken: {
      titel: 'Schminken',
      tekst: 'Creatieve en kleurrijke schmink voor jong en oud.',
    },
    glittertattoos: {
      titel: "Glittertattoo's",
      tekst: "Mooie, tijdelijke glittertattoo's in allerlei designs.",
    },
    feestenEvents: {
      titel: 'Feestjes & Evenementen',
      tekst:
        'Voor kinderfeestjes, schoolfeesten, markten en andere gelegenheden.',
    },
  },

  // De koppen bovenaan de 3 volledige foto-album-pagina's (met de
  // "Terug"-link), die je bereikt via de blokken op de "Mijn werk"-pagina.
  werkPaginas: {
    schminken: 'Schminken',
    glittertattoos: "Glittertattoo's",
    feestenEvents: 'Elke feest of event',
  },

  // ------------------------------------------------------------
  // AANVRAAGFORMULIER-PAGINA (via de "AANVRAAG DOEN"-knop)
  // ------------------------------------------------------------
  aanvraag: {
    titel: 'Aanvraag doen?',
    intro:
      'Vul het formulier in en ik neem contact met je op over je feest of evenement.',
    labelNaam: 'Naam',
    labelEmail: 'E-mail',
    labelDatum: 'Datum evenement',
    labelBericht: 'Bericht',
    knop: 'Verstuur Aanvraag',
  },
};
