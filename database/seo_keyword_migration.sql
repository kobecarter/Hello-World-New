-- SEO keyword field rollout + SEO content refresh (AI agent solutions, listing page, secteur pages, main pages, homepage)
-- Adds a seo_keyword column (mirroring hw_details_service) to every hw_details_* table that already has seo_titre/seo_description,
-- then applies the FR/EN SEO title, description and keyword content generated from the Mapping_SEO Hello World Agency brief.
-- Safe to re-run: ALTER TABLE steps will fail loudly if the column already exists (expected on a second run); UPDATEs are idempotent.

-- ── 1. Schema: add seo_keyword ──────────────────────────────────────────────
ALTER TABLE hw_details_agent_ia         ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_blog             ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_categorie        ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_categorie_produit ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_formation        ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_page             ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_produit          ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
ALTER TABLE hw_details_secteur          ADD COLUMN seo_keyword VARCHAR(500) NULL AFTER seo_description;
-- hw_details_service already has seo_keyword (varchar(300)) — widen it for consistency with the other 8 tables:
ALTER TABLE hw_details_service          MODIFY COLUMN seo_keyword VARCHAR(500) NULL;

-- ── 2. Content: HW AI agent solutions (hw_details_agent_ia) ────────────────
UPDATE hw_details_agent_ia
SET seo_titre='HW Concierge AI | Concierge IA pour hôtels au Maroc',
    seo_description='Concierge IA pour hôtels et hospitality premium au Maroc : réservation, accueil, relation client multilingue WhatsApp & chatbot.',
    seo_keyword='concierge IA hôtel Maroc, assistant client IA Maroc, concierge digital Casablanca Maroc, agent accueil Marrakech Maroc, assistant réservation Rabat Maroc, chatbot concierge Tanger Maroc, relation client Agadir Maroc, concierge WhatsApp hôtel Maroc, assistant premium hospitality Maroc, support client luxe Maroc'
WHERE slug='hw-concierge-ai' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW Concierge AI | AI Concierge for Hotels in Morocco',
    seo_description='AI concierge for hotels and premium hospitality in Morocco: booking, welcome, multilingual customer relations via WhatsApp & chatbot.',
    seo_keyword='AI hotel concierge Morocco, AI customer assistant Morocco, digital concierge Casablanca, hotel reception agent Marrakech, booking assistant Rabat, concierge chatbot Tangier, customer relations Agadir, WhatsApp hotel concierge Morocco, premium hospitality assistant Morocco, luxury customer support Morocco'
WHERE slug='hw-concierge-ai' AND langue='en';

UPDATE hw_details_agent_ia
SET seo_titre='HW WhatsApp Agent | Agent WhatsApp IA Entreprise Maroc',
    seo_description='Automatisez vos conversations WhatsApp Business avec un agent IA : qualification, support, relances et lead generation au Maroc.',
    seo_keyword='agent WhatsApp entreprise Maroc, automatisation WhatsApp Casablanca Maroc, chatbot WhatsApp Marrakech Maroc, WhatsApp business Rabat Maroc, relance WhatsApp Tanger Maroc, campagne WhatsApp Agadir Maroc, support WhatsApp entreprise Maroc, lead generation WhatsApp Maroc, intégration CRM WhatsApp Maroc, agent IA WhatsApp Maroc'
WHERE slug='hw-whatsapp-agent' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW WhatsApp Agent | Business WhatsApp AI Agent Morocco',
    seo_description='Automate your WhatsApp Business conversations with an AI agent: qualification, support, follow-ups and lead generation in Morocco.',
    seo_keyword='WhatsApp business agent Morocco, WhatsApp automation Casablanca Morocco, WhatsApp chatbot Marrakech Morocco, WhatsApp business Rabat Morocco, WhatsApp follow-up Tangier Morocco, WhatsApp campaign Agadir Morocco, business WhatsApp support Morocco, WhatsApp lead generation Morocco, WhatsApp CRM integration Morocco, AI WhatsApp agent Morocco'
WHERE slug='hw-whatsapp-agent' AND langue='en';

UPDATE hw_details_agent_ia
SET seo_titre='HW SDR Agent | Agent IA Prospection B2B au Maroc',
    seo_description='Agent SDR IA pour la prospection B2B au Maroc : qualification, enrichissement, lead scoring et séquences outbound automatisées.',
    seo_keyword='SDR agent entreprise Maroc, prospection IA Casablanca Maroc, agent commercial Marrakech Maroc, qualification leads Rabat Maroc, outbound B2B Tanger Maroc, enrichissement leads Agadir Maroc, prospection automatisée Maroc, lead scoring entreprise Maroc, séquences commerciales IA Maroc, agent prospection B2B Maroc'
WHERE slug='hw-sdr-agent' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW SDR Agent | AI B2B Prospecting Agent Morocco',
    seo_description='AI SDR agent for B2B prospecting in Morocco: qualification, enrichment, lead scoring and automated outbound sequences.',
    seo_keyword='SDR agent business Morocco, AI prospecting Casablanca Morocco, sales agent Marrakech Morocco, lead qualification Rabat Morocco, B2B outbound Tangier Morocco, lead enrichment Agadir Morocco, automated prospecting Morocco, enterprise lead scoring Morocco, AI sales sequences Morocco, B2B prospecting agent Morocco'
WHERE slug='hw-sdr-agent' AND langue='en';

UPDATE hw_details_agent_ia
SET seo_titre='HW Support 24/7 | Helpdesk IA & SAV Automatisé Maroc',
    seo_description='Helpdesk IA 24/7 pour entreprises au Maroc : support multicanal, ticketing intelligent, chatbot SAV et base de connaissances.',
    seo_keyword='support client IA Maroc, agent support Casablanca Maroc, helpdesk IA Marrakech Maroc, service client Rabat Maroc, support multicanal Tanger Maroc, chatbot SAV Agadir Maroc, ticketing intelligent Maroc, support 24 7 entreprise Maroc, base connaissance IA Maroc, agent service client Maroc'
WHERE slug='hw-support-24-7' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW Support 24/7 | AI Helpdesk & Automated Support Morocco',
    seo_description='24/7 AI helpdesk for businesses in Morocco: multichannel support, smart ticketing, service chatbot and knowledge base.',
    seo_keyword='AI customer support Morocco, support agent Casablanca Morocco, AI helpdesk Marrakech Morocco, customer service Rabat Morocco, multichannel support Tangier Morocco, customer service chatbot Agadir Morocco, smart ticketing Morocco, 24 7 business support Morocco, AI knowledge base Morocco, customer service agent Morocco'
WHERE slug='hw-support-24-7' AND langue='en';

UPDATE hw_details_agent_ia
SET seo_titre='HW Content Studio | Studio Contenu SEO IA au Maroc',
    seo_description='Studio de contenu assisté par l\'IA : rédaction SEO, content ops, blog automation et production éditoriale B2B au Maroc.',
    seo_keyword='content studio IA Maroc, contenu SEO Casablanca Maroc, rédaction IA Marrakech Maroc, content ops Rabat Maroc, production contenu Tanger Maroc, blog automation Agadir Maroc, contenu marketing B2B Maroc, SEO éditorial entreprise Maroc, rédaction assistée IA Maroc, studio contenu entreprise Maroc'
WHERE slug='hw-content-studio' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW Content Studio | AI SEO Content Studio Morocco',
    seo_description='AI-assisted content studio: SEO writing, content ops, blog automation and B2B editorial production in Morocco.',
    seo_keyword='AI content studio Morocco, SEO content Casablanca Morocco, AI writing Marrakech Morocco, content ops Rabat Morocco, content production Tangier Morocco, blog automation Agadir Morocco, B2B marketing content Morocco, enterprise editorial SEO Morocco, AI-assisted writing Morocco, enterprise content studio Morocco'
WHERE slug='hw-content-studio' AND langue='en';

UPDATE hw_details_agent_ia
SET seo_titre='HW Voice Caller | Agent Vocal IA Téléphonique Maroc',
    seo_description='Agent vocal IA pour appels sortants et relances téléphoniques au Maroc : qualification, confirmation RDV, voice bot multilingue.',
    seo_keyword='voice caller entreprise Maroc, agent vocal Casablanca Maroc, relance vocale Marrakech Maroc, appel automatique Rabat Maroc, voice bot Tanger Maroc, confirmation rendez vous Agadir Maroc, qualification téléphonique IA Maroc, agent vocal commercial Maroc, appels sortants automatisés Maroc, voice AI entreprise Maroc'
WHERE slug='hw-voice-caller' AND langue='fr';

UPDATE hw_details_agent_ia
SET seo_titre='HW Voice Caller | AI Voice Calling Agent Morocco',
    seo_description='AI voice agent for outbound calls and phone follow-ups in Morocco: qualification, appointment confirmation, multilingual voice bot.',
    seo_keyword='voice caller business Morocco, voice agent Casablanca Morocco, voice follow-up Marrakech Morocco, automated calling Rabat Morocco, voice bot Tangier Morocco, appointment confirmation Agadir Morocco, AI phone qualification Morocco, sales voice agent Morocco, automated outbound calls Morocco, voice AI business Morocco'
WHERE slug='hw-voice-caller' AND langue='en';

-- ── 3. Content: AI agents listing page (hw_page id 44) ─────────────────────
UPDATE hw_details_page
SET seo_titre='Agents IA Maroc — Marketplace de 20+ Solutions | HW',
    seo_description='Découvrez nos agents IA pour entreprises marocaines : relation client, ventes, support et contenu. Comparez et réservez une démo en ligne.',
    seo_keyword='agents IA Maroc, marketplace IA entreprise, assistant IA entreprise Maroc, automatisation IA Maroc, solutions IA B2B Maroc, agent conversationnel Maroc'
WHERE id_page=44 AND langue='fr';

UPDATE hw_details_page
SET seo_titre='AI Agents Morocco — Marketplace of 20+ Solutions',
    seo_description='Discover our AI agents for Moroccan businesses: customer relations, sales, support and content. Compare and book an online demo.',
    seo_keyword='AI agents Morocco, enterprise AI marketplace, AI business assistant Morocco, business automation AI Morocco, B2B AI solutions Morocco, conversational AI agent Morocco'
WHERE id_page=44 AND langue='en';

-- ── 4. Content: secteur pages (hw_details_secteur) ──────────────────────────
UPDATE hw_details_secteur SET seo_titre='IA pour Cabinets Médicaux & Cliniques au Maroc',
  seo_description='Agent IA pour cabinets médicaux et cliniques au Maroc : prise de RDV, secrétariat médical, support patient WhatsApp.',
  seo_keyword='agent IA cabinet médical, prise rendez vous médecin, assistant médical Casablanca Maroc, secrétariat médical Marrakech Maroc, gestion rendez vous Rabat, support patient Tanger Maroc, réception cabinet Agadir Maroc, automatisation clinique Maroc, chatbot santé entreprise Maroc, agent médical WhatsApp Maroc'
WHERE slug='sante' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Medical Practices & Clinics in Morocco',
  seo_description='AI agent for medical practices and clinics in Morocco: appointment booking, medical secretarial support, WhatsApp patient support.',
  seo_keyword='AI agent medical practice, doctor appointment booking, medical assistant Casablanca Morocco, medical secretary Marrakech Morocco, appointment management Rabat, patient support Tangier Morocco, clinic reception Agadir Morocco, clinic automation Morocco, healthcare chatbot Morocco, medical WhatsApp agent Morocco'
WHERE slug='sante' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour Restaurants au Maroc | Réservation & Commandes',
  seo_description='Automatisez votre restaurant au Maroc : agent WhatsApp de réservation, prise de commande, support client et chatbot multilingue.',
  seo_keyword='service client restaurant Maroc, agent réservation restaurant Maroc, WhatsApp restaurant Casablanca Maroc, chatbot restaurant Marrakech Maroc, prise commande Rabat Maroc, support restaurant Tanger Maroc, relation client Agadir restaurant, automatisation restaurant au Maroc, assistant restaurant WhatsApp Maroc, accueil client restaurant Maroc'
WHERE slug='restauration' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Restaurants in Morocco | Booking & Orders',
  seo_description='Automate your restaurant in Morocco: WhatsApp booking agent, order taking, customer support and multilingual chatbot.',
  seo_keyword='restaurant customer service Morocco, restaurant booking agent Morocco, WhatsApp restaurant Casablanca Morocco, restaurant chatbot Marrakech Morocco, order taking Rabat Morocco, restaurant support Tangier Morocco, customer relations Agadir restaurant, restaurant automation Morocco, WhatsApp restaurant assistant Morocco, restaurant customer welcome Morocco'
WHERE slug='restauration' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour Hôtels au Maroc | Concierge & Réception 24/7',
  seo_description='Automatisez votre hôtel au Maroc : concierge IA, réceptionniste WhatsApp, gestion des réservations et guest experience premium.',
  seo_keyword='réceptionniste IA hôtel Maroc, agent hôtel WhatsApp Maroc, réservation hôtel Casablanca Maroc, support hôtel Marrakech Maroc, concierge hôtel Rabat Maroc, service client hôtel Tanger, accueil hôtel Agadir Maroc, automatisation hôtelière Maroc, assistant guest experience Maroc, chatbot hôtel de luxe'
WHERE slug='hotellerie' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Hotels in Morocco | 24/7 Concierge & Reception',
  seo_description='Automate your hotel in Morocco: AI concierge, WhatsApp receptionist, booking management and premium guest experience.',
  seo_keyword='AI hotel receptionist Morocco, WhatsApp hotel agent Morocco, hotel booking Casablanca Morocco, hotel support Marrakech Morocco, hotel concierge Rabat Morocco, hotel customer service Tangier, hotel welcome Agadir Morocco, hotel automation Morocco, guest experience assistant Morocco, luxury hotel chatbot'
WHERE slug='hotellerie' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour Agences Immobilières au Maroc | Leads & WhatsApp',
  seo_description="IA pour l'immobilier au Maroc : qualification de leads, WhatsApp immobilier, scraping de biens, relances et suivi de programmes.",
  seo_keyword='agent immobilier IA Maroc, WhatsApp immobilier Casablanca Maroc, scraping immobilier Marrakech Maroc, relance prospects Rabat Maroc, suivi chantier Tanger Maroc, appels immobiliers Agadir Maroc, qualification leads immobilier Maroc, reporting programmes immobiliers Maroc, automatisation agence immobilière Maroc, agent vente immobilière Maroc'
WHERE slug='immobilier' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Real Estate Agencies in Morocco | Leads & WhatsApp',
  seo_description='AI for real estate in Morocco: lead qualification, WhatsApp real estate, property scraping, follow-ups and project tracking.',
  seo_keyword='real estate AI agent Morocco, WhatsApp real estate Casablanca Morocco, property scraping Marrakech Morocco, prospect follow-up Rabat Morocco, construction tracking Tangier Morocco, real estate calls Agadir Morocco, real estate lead qualification Morocco, real estate project reporting Morocco, real estate agency automation Morocco, real estate sales agent Morocco'
WHERE slug='immobilier' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour la Finance au Maroc | Forex, Reporting & Dépenses',
  seo_description='Agent IA finance au Maroc : signaux forex, alertes trading, suivi des dépenses, reporting financier et veille de marché automatisée.',
  seo_keyword='agent finance IA Maroc, suivi dépenses Casablanca Maroc, alertes trading Marrakech Maroc, signaux forex Rabat Maroc, reporting financier Tanger Maroc, automatisation finance Agadir Maroc, suivi reçus entreprise Maroc, agent Telegram finance Maroc, veille sentiment marché Maroc, assistant finance opérationnelle Maroc'
WHERE slug='finance' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Finance in Morocco | Forex, Reporting & Expenses',
  seo_description='AI finance agent in Morocco: forex signals, trading alerts, expense tracking, financial reporting and automated market watch.',
  seo_keyword='finance AI agent Morocco, expense tracking Casablanca Morocco, trading alerts Marrakech Morocco, forex signals Rabat Morocco, financial reporting Tangier Morocco, finance automation Agadir Morocco, business receipt tracking Morocco, finance Telegram agent Morocco, market sentiment watch Morocco, operational finance assistant Morocco'
WHERE slug='finance' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour Marketing & Social Media au Maroc',
  seo_description='Agent IA marketing au Maroc : automatisation social media, reporting SEO, partage de contenu, content automation entreprise.',
  seo_keyword='agent marketing IA Maroc, suivi SEO Casablanca Maroc, reporting marketing Marrakech Maroc, partage contenu Rabat Maroc, automatisation social media Tanger, diffusion articles Agadir Maroc, content automation entreprise Maroc, tableau marketing hebdomadaire Maroc, SEO reporting automatique Maroc, agent contenu marketing Maroc'
WHERE slug='marketing' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Marketing & Social Media in Morocco',
  seo_description='AI marketing agent in Morocco: social media automation, SEO reporting, content sharing, business content automation.',
  seo_keyword='marketing AI agent Morocco, SEO tracking Casablanca Morocco, marketing reporting Marrakech Morocco, content sharing Rabat Morocco, social media automation Tangier, article distribution Agadir Morocco, business content automation Morocco, weekly marketing dashboard Morocco, automated SEO reporting Morocco, marketing content agent Morocco'
WHERE slug='marketing' AND langue='en';

UPDATE hw_details_secteur SET seo_titre='IA pour Opérations Internes & Productivité Entreprise',
  seo_description="Agent IA pour la productivité des équipes au Maroc : notifications Gmail, résumés Trello, deadlines Slack, analyse d'appels Zoom.",
  seo_keyword='agent productivité entreprise Maroc, notifications Gmail Casablanca Maroc, résumé Trello Marrakech Maroc, Slack deadlines Rabat Maroc, analyse appels Zoom Tanger, assistant équipe Agadir Maroc, automatisation opérations internes Maroc, workflow collaboration entreprise Maroc, agent WhatsApp interne Maroc, coordination équipe automatisée Maroc'
WHERE slug='operations' AND langue='fr';
UPDATE hw_details_secteur SET seo_titre='AI for Internal Operations & Business Productivity',
  seo_description='AI agent for team productivity in Morocco: Gmail notifications, Trello summaries, Slack deadlines, Zoom call analysis.',
  seo_keyword='business productivity agent Morocco, Gmail notifications Casablanca Morocco, Trello summary Marrakech Morocco, Slack deadlines Rabat Morocco, Zoom call analysis Tangier, team assistant Agadir Morocco, internal operations automation Morocco, business collaboration workflow Morocco, internal WhatsApp agent Morocco, automated team coordination Morocco'
WHERE slug='operations' AND langue='en';

-- ── 5. Content: main site pages (hw_details_page) ──────────────────────────
UPDATE hw_details_page SET seo_titre='Réalisations & Cas Clients | Hello World Agency Maroc',
  seo_description='Découvrez notre portfolio : projets IA, SaaS, web et mobile pour grands comptes à Casablanca, Marrakech, Rabat, Tanger, Agadir.',
  seo_keyword='réalisations agence IA Maroc, portfolio agence web Maroc, cas clients Casablanca Maroc, références Marrakech Maroc, projets digitaux Rabat Maroc, études de cas B2B, références Tanger Maroc, portfolio Agadir Maroc, cas clients grands comptes, réalisations SaaS Maroc'
WHERE id_page=2 AND langue='fr';
UPDATE hw_details_page SET seo_titre='Our Work & Case Studies | Hello World Agency Morocco',
  seo_description='Explore our portfolio: AI, SaaS, web and mobile projects for major accounts in Casablanca, Marrakech, Rabat, Tangier, Agadir.',
  seo_keyword='AI agency portfolio Morocco, web agency portfolio Morocco, client case studies Casablanca Morocco, references Marrakech Morocco, digital projects Rabat Morocco, B2B case studies, references Tangier Morocco, portfolio Agadir Morocco, enterprise client case studies, SaaS portfolio Morocco'
WHERE id_page=2 AND langue='en';

UPDATE hw_details_page SET seo_titre='Contact & Audit IA gratuit | Hello World Agency Maroc',
  seo_description='Contactez Hello World Agency : audit IA gratuit, devis SaaS, demande de démo. Bureaux à Casablanca, intervention dans tout le Maroc.',
  seo_keyword='contact agence IA Maroc, audit IA Casablanca Maroc, audit IA Marrakech Maroc, audit IA Rabat Maroc, audit IA Tanger Maroc, audit IA Agadir Maroc, devis SaaS entreprise Maroc, demande démo IA Maroc, contact grands comptes Maroc, appel offres digital Maroc'
WHERE id_page=5 AND langue='fr';
UPDATE hw_details_page SET seo_titre='Contact & Free AI Audit | Hello World Agency Morocco',
  seo_description='Contact Hello World Agency: free AI audit, SaaS quote, demo request. Offices in Casablanca, serving businesses across Morocco.',
  seo_keyword='contact AI agency Morocco, AI audit Casablanca Morocco, AI audit Marrakech Morocco, AI audit Rabat Morocco, AI audit Tangier Morocco, AI audit Agadir Morocco, business SaaS quote Morocco, AI demo request Morocco, enterprise contact Morocco, digital RFP Morocco'
WHERE id_page=5 AND langue='en';

UPDATE hw_details_page SET seo_titre='Insights IA, SaaS & Transformation digitale au Maroc',
  seo_description='Blog expert : agents IA, automatisation, SaaS B2B, transformation digitale et veille tech pour entreprises au Maroc.',
  seo_keyword='blog IA entreprise Maroc, blog transformation digitale Maroc, veille IA Casablanca Maroc, automatisation entreprise Marrakech Maroc, SaaS B2B Rabat Maroc, innovation digitale Tanger Maroc, contenu expert Agadir Maroc, articles agents IA Maroc, tendances IA entreprise Maroc, blog SEO automation Maroc'
WHERE id_page=9 AND langue='fr';
UPDATE hw_details_page SET seo_titre='AI, SaaS & Digital Transformation Insights in Morocco',
  seo_description='Expert blog: AI agents, automation, B2B SaaS, digital transformation and tech watch for businesses in Morocco.',
  seo_keyword='business AI blog Morocco, digital transformation blog Morocco, AI watch Casablanca Morocco, business automation Marrakech Morocco, B2B SaaS Rabat Morocco, digital innovation Tangier Morocco, expert content Agadir Morocco, AI agent articles Morocco, enterprise AI trends Morocco, SEO automation blog Morocco'
WHERE id_page=9 AND langue='en';

UPDATE hw_details_page SET seo_titre='Marketplace Agents IA prêts à déployer au Maroc',
  seo_description='Découvrez notre catalogue d\'agents IA prêts à déployer : packs, bundles et abonnements pour entreprises au Maroc. Démo gratuite.',
  seo_keyword='marketplace solutions IA Maroc, catalogue agents IA Maroc, pack IA entreprise Maroc, solution IA Casablanca Maroc, abonnement IA Marrakech Maroc, outil IA Rabat Maroc, agent prêt déployer Maroc, bundle IA Tanger Maroc, démo solution IA Agadir, comparatif agents IA Maroc'
WHERE id_page=24 AND langue='fr';
UPDATE hw_details_page SET seo_titre='AI Agents Marketplace — Ready to Deploy in Morocco',
  seo_description='Discover our catalog of ready-to-deploy AI agents: packs, bundles and subscriptions for businesses in Morocco. Free demo.',
  seo_keyword='AI solutions marketplace Morocco, AI agents catalog Morocco, business AI pack Morocco, AI solution Casablanca Morocco, AI subscription Marrakech Morocco, AI tool Rabat Morocco, ready-to-deploy agent Morocco, AI bundle Tangier Morocco, AI solution demo Agadir, AI agents comparison Morocco'
WHERE id_page=24 AND langue='en';

UPDATE hw_details_page SET seo_titre='Formations IA pour entreprises & dirigeants au Maroc',
  seo_description='Formations IA pour entreprises : master class dirigeants, bootcamp automatisation no-code, ateliers agents IA à Casablanca, Marrakech, Rabat.',
  seo_keyword='formation IA entreprise Maroc, formation IA Casablanca Maroc, formation IA Marrakech Maroc, formation IA Rabat Maroc, formation IA Tanger Maroc, formation IA Agadir Maroc, master class IA dirigeants, bootcamp automatisation no code, atelier agents IA Maroc, formation IA commerciale Maroc'
WHERE id_page=41 AND langue='fr';
UPDATE hw_details_page SET seo_titre='AI Training for Businesses & Executives in Morocco',
  seo_description='AI training for businesses: executive master classes, no-code automation bootcamps, AI agent workshops in Casablanca, Marrakech, Rabat.',
  seo_keyword='AI training for business Morocco, AI training Casablanca Morocco, AI training Marrakech Morocco, AI training Rabat Morocco, AI training Tangier Morocco, AI training Agadir Morocco, executive AI master class, no-code automation bootcamp, AI agent workshop Morocco, sales AI training Morocco'
WHERE id_page=41 AND langue='en';

-- ── 6. Content: homepage (hw_details_config — no seo_keyword column here) ──
UPDATE hw_details_config SET titre='Hello World Agency | Agence IA & SaaS au Maroc',
  description='Agence IA au Maroc : agents IA, automatisation, SaaS sur mesure et audit IA pour entreprises à Casablanca, Marrakech, Rabat, Tanger, Agadir.'
WHERE langue='fr';
UPDATE hw_details_config SET titre='Hello World Agency | AI & SaaS Agency in Morocco',
  description='AI agency in Morocco: AI agents, automation, custom SaaS and AI audits for businesses in Casablanca, Marrakech, Rabat, Tangier, Agadir.'
WHERE langue='en';
