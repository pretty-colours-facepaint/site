// ============================================================
// ALLE TEKSTEN VAN DE WEBSITE — GEEN CODE NODIG
// (Foto's beheer je niet hier, maar door ze in de juiste map te zetten —
// zie assets/mijn-werk/LEES-MIJ.txt en assets/foto-voorpagina/LEES-MIJ.txt.)
// Verander hieronder alleen wat er RECHTS van een dubbele punt (:) staat,
// tussen de aanhalingstekens " ". Zet <br> in een tekst als je een regel
// wilt afbreken. Sla dit bestand op en zet het online — geen "build"
// nodig, de browser leest dit bestand direct.
// ============================================================
const SITE_CONFIG = {
  contact: {
    telefoon: '06 – 123456789',
    email: 'info@voorbeeld.nl',
    regio: '30 km rond Hoofddorp',
    tagline: 'Kleur maakt alles leuker!',
    ctaAanvraag: 'AANVRAAG DOEN',
  },

  // De "Prijzen" pagina: titel bovenaan, de 3 kaartjes per icoontje
  // (HART, BLIKSEM, STER), en de tekst onderaan de pagina.
  prijzen: {
    titel: 'Prijzen',
    footnote: 'Placeholder tekst: neem contact op voor een offerte op maat.',
    hart: {
      titel: 'Schminken',
      prijs: '€ 1,-',
      tekst: 'Placeholder tekst over de schminkprijzen.',
    },
    bliksem: {
      titel: "Glittertattoo's",
      prijs: '€ 2,-',
      tekst: 'Placeholder tekst over de glittertattoo-prijzen.',
    },
    ster: {
      titel: 'Feestjes & evenementen',
      prijs: '€ 3,-',
      tekst: 'Placeholder tekst over de prijzen voor feestjes etc.',
    },
  },

  // De 3 diensten, de 2 knoppen, en het "Over mij" stukje op de voorpagina.
  homepage: {
    ctaWerk: 'BEKIJK MIJN WERK',
    ctaPrijzen: 'BEKIJK DE PRIJZEN',
    hart: {
      titel: 'Schminken!',
      tekst: 'Creatieve en kleurrijke schmink<br> voor jong en oud.',
    },
    bliksem: {
      titel: "Glittertattoo's",
      tekst: "Mooie, tijdelijke glittertattoo's<br> in allerlei designs.",
    },
    ster: {
      titel: 'Feestjes & Evenementen',
      tekst:
        'Voor kinderfeestjes, schoolfeesten,<br>markten en andere gelegenheden.',
    },
    over: {
      titel: 'Hoi, ik ben Sanne!',
      tekst:
        'Mijn naam is Sanne Lek en ik schmink op kinderfeestjes, evenementen en voor bedrijven of winkels in een straal van 30 km rond Hoofddorp.',
    },
  },

  // De koppen bovenaan de 3 foto-paginas (met "Terug" link).
  werkPaginas: {
    schminken: 'Schminken',
    glittertattoos: "Glittertattoo's",
    feestenEvents: 'Elke feest of event',
  },

  // De "Mijn werk" overzichtspagina: titel/intro bovenaan, en de tekst
  // onder elk van de 3 categorieblokken (met een paar voorbeeldfoto's en
  // een link naar de volledige album-pagina van die categorie).
  werkOverzicht: {
    titel: 'Mijn werk',
    intro: "Een greep uit eerder werk: schminken, glittertattoo's en feestjes & evenementen.",
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
      tekst: 'Voor kinderfeestjes, schoolfeesten, markten en andere gelegenheden.',
    },
  },

  // Het "website in aanbouw" schermpje dat op de voorpagina verschijnt.
  // Zet actief op false om het helemaal uit te zetten (bijv. zodra de
  // site live gaat) zonder iets anders te hoeven aanpassen.
  overlay: {
    actief: true,
    titel: 'Website in aanbouw',
    tekst:
      "Deze website is nog in ontwikkeling. Sommige teksten en foto's zijn nog placeholders.",
    knop: 'Ik snap het, ga verder',
  },

  // De simpele voettekst onderaan de glittertattoo- en feesten-pagina.
  footerSimple: {
    tekst: '© 2026 Pretty Colours Facepaint. Placeholder footertekst.',
  },

  // Het aanvraagformulier.
  aanvraag: {
    titel: 'Aanvraag doen?',
    intro:
      'Vul het formulier in en ik neem contact met je op over je feest of evenement.',
    labelNaam: 'Naam',
    labelEmail: 'E-mail',
    labelDatum: 'Datum evenement',
    labelBericht: 'Bericht',
    knop: 'Verstuur aanvraag',
  },

  // De rondjes met social-media-links in de footer. Elk badge heeft een
  // titel (tooltip/toegankelijkheid), logo (de 1-3 letters in het rondje),
  // link, en optioneel een kleur (hex-code) voor de achtergrond — zonder
  // kleur wordt het rondje grijs. Een badge weglaten of de hele lijst leeg
  // maken ([]) zorgt dat hij simpelweg niet getoond wordt.
  socials: [
    { titel: 'Instagram', logo: 'IG', link: 'https://instagram.com/', kleur: '#E1306C' },
    { titel: 'Facebook', logo: 'FB', link: 'https://facebook.com/', kleur: '#1877F2' },
  ],
};
