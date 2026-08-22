// ============================================================
// ALLE TEKSTEN VAN DE WEBSITE — GEEN CODE NODIG
// (Foto's beheer je niet hier, maar door ze in de juiste map te zetten —
// zie portfolio/LEES-MIJ.txt en posters/LEES-MIJ.txt in deze map. De
// "cover"-foto's hieronder zijn gewoon een pad naar een bestaande foto.)
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
    // Sectie A (1e kolom, linksboven — schminken). "cover" is de
    // voorbeeldfoto eronder — het pad is relatief aan deze map
    // (MAAK_HIER_AANPASSINGEN/), zie posters/LEES-MIJ.txt.
    sectionA: {
      titel: 'Schminken',
      tekst: 'Creatieve en kleurrijke schmink<br> voor jong en oud.',
      cover: 'posters/1.jpeg',
    },
    // Sectie B (2e kolom, midden — glittertattoo's).
    sectionB: {
      titel: "Glittertattoo's",
      tekst: "Mooie, tijdelijke glittertattoo's<br> in allerlei designs.",
      cover: 'posters/2.jpeg',
    },
    // Sectie C (3e kolom, rechts — feestjes & evenementen).
    sectionC: {
      titel: 'Feestjes & Evenementen',
      tekst:
        'Voor kinderfeestjes, schoolfeesten,<br>markten en andere gelegenheden.',
      cover: 'posters/3.jpg',
    },
    // De 2 ronde knoppen onder de 3 voorbeeldfoto's.
    callToActionPortfolio: 'BEKIJK MIJN WERK',
    callToActionPrijzen: 'BEKIJK DE PRIJZEN',
    // Het "Over mij"-blok, helemaal onderaan de voorpagina. "foto" is de
    // ronde portretfoto, relatief aan deze map (MAAK_HIER_AANPASSINGEN/).
    over: {
      titel: 'Hoi, ik ben Sanne!',
      tekst:
        'Mijn naam is Sanne Lek en ik schmink op (kinder)feestjes en evenementen. Voor particulieren, bedrijven of winkels. Ook kan ik uw feest nog stralender maken door middel van het zetten van glittertattoo's. Ik heb inmiddels 5 jaar ervaring als schminker en glittertattoo-artiest en weet van elk event een kleurrijk feestje te maken! Ik woon in Hoofddorp maar kan naar elke locatie in Nederland komen.',
      foto: 'portret.png',
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
  // BOVENAAN elke pagina (logo-tekst, "AANVRAAG DOEN"-knop).
  // ------------------------------------------------------------
  contact: {
    // Tekst op de ronde knop rechtsboven op elke pagina, en op de knop
    // onder het "Over mij"-blok op de voorpagina.
    callToAction: 'AANVRAAG DOEN',
  },

  // ------------------------------------------------------------
  // ONDERAAN elke pagina (de footer): contactgegevens naast het kleine
  // logo, en de rondjes met social-media-links.
  // ------------------------------------------------------------
  footer: {
    contact: {
      tagline: 'Kleur maakt alles leuker!',
      telefoon: '06 – 123456789',
      email: 'info@voorbeeld.nl',
      regio: '30 km rond Hoofddorp',
    },

    // Elk badge heeft een titel (tooltip/toegankelijkheid), logo
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
  },

  // ------------------------------------------------------------
  // PRIJZEN-PAGINA (via het menu / de knop "BEKIJK DE PRIJZEN")
  // ------------------------------------------------------------
  prijzen: {
    titel: 'Prijzen',
    // Sectie A (1e kaartje — schminken). "cover" is de foto erin — het pad
    // is relatief aan deze map (MAAK_HIER_AANPASSINGEN/), zie
    // posters/LEES-MIJ.txt. Los aan te passen van de voorbeeldfoto op
    // de voorpagina (homepage.sectionA.cover hierboven).
    sectionA: {
      titel: 'Schminken',
      prijs: '€ 4,-',
      tekst: 'Placeholder tekst over de schminkprijzen.',
      cover: 'posters/1.jpeg',
    },
    // Sectie B (2e kaartje — glittertattoo's).
    sectionB: {
      titel: "Glittertattoo's",
      prijs: '€ 5,-',
      tekst: 'Placeholder tekst over de glittertattoo-prijzen.',
      cover: 'posters/2.jpeg',
    },
    // Sectie C (3e kaartje — feestjes & evenementen).
    sectionC: {
      titel: 'Feestjes & evenementen',
      prijs: '€ 6,-',
      tekst: 'Placeholder tekst over de prijzen voor feestjes etc.',
      cover: 'posters/3.jpg',
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
  portfolio: {
    titel: 'Mijn werk',
    intro:
      "Een greep uit eerder werk: schminken, glittertattoo's en feestjes & evenementen.",
    sectionA: {
      titel: 'Schminken',
      tekst: 'Creatieve en kleurrijke schmink voor jong en oud.',
    },
    sectionB: {
      titel: "Glittertattoo's",
      tekst: "Mooie, tijdelijke glittertattoo's in allerlei designs.",
    },
    sectionC: {
      titel: 'Feestjes & Evenementen',
      tekst:
        'Voor kinderfeestjes, schoolfeesten, markten en andere gelegenheden.',
    },

    // De koppen bovenaan de 3 volledige foto-album-pagina's (met de
    // "Terug"-link), die je bereikt via de blokken hierboven.
    paginas: {
      sectionA: 'Schminken',
      sectionB: "Glittertattoo's",
      sectionC: 'Elke feest of event',
    },
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
