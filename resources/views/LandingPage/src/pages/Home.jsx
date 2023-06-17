import { Helmet } from 'react-helmet';
import { useOutletContext } from 'react-router-dom';
import { PrimaryButton, ContentBlock } from '../components/Elements';
import Header from '../components/Header';

function Home() {
  const [theme] = useOutletContext();
  return (
    <>
      <Helmet>
        <title>G Syndic</title>
        {/* <link rel="canonical" href="https://community-architects.net" /> */}
      </Helmet>
      <Header>
        <div>
          <h1><span className='G'>G</span> Syndic</h1>
          <p>
          "Bienvenue dans notre application de gestion de syndic, conçue pour vous faciliter la vie en simplifiant toutes les tâches complexes liées à la gestion de votre copropriété. Découvrez comment notre solution innovante peut transformer votre expérience de syndic."
          </p>
        </div>
      </Header>
      <main className="main-content">

            <h2 className='contentblock-text1'>Quelques fonctionnalités clés!</h2>

        <ContentBlock animate>
          <div className='contentblock-text'>
            <h2>Gestion des documents</h2>
            <p>
            Importez, stockez et partagez facilement les documents importants tels que les procès-verbaux des réunions, les contrats et les règlements internes.
            </p>
{/*             
            <div className='contentblock-actions'>
              <PrimaryButton text="Visit Content" destination="content" arrow />
            </div>
             */}
          </div>
          <div className='contentblock-image'>
            <img className='no-touch' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/illustrations/opportunities-dark.svg').default
              :
              require('../assets/illustrations/opportunities-light.svg').default}
            />
          </div>
        </ContentBlock>

        <ContentBlock animate r>
          <div className='contentblock-text'>
            <h2>Communication centralisée</h2>
            <p>
            Facilitez la communication entre les copropriétaires, le syndic et les prestataires de services grâce à notre système de messagerie intégré.
            </p>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/illustrations/helpdesk-dark.svg').default
              :
              require('../assets/illustrations/helpdesk-light.svg').default}
            />
          </div>
        </ContentBlock>

        <ContentBlock animate>
          <div className='contentblock-text'>
            <h2>Suivi des dépenses</h2>
            <p>
            Tenez un suivi précis des dépenses et des paiements, générez des rapports détaillés et simplifiez la gestion financière de votre copropriété.            </p>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/illustrations/camp-dark.svg').default
              :
              require('../assets/illustrations/camp-light.svg').default}
            />
          </div>
        </ContentBlock>

        <ContentBlock animate r>
          <div className='contentblock-text'>
            <h2>Réservation des équipements</h2>
            <p>
            Réservez facilement les espaces communs tels que les salles de réunion, les jardins ou les terrains de sport via notre système de réservation convivial.
            </p>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/illustrations/showcase-dark.svg').default
              :
              require('../assets/illustrations/showcase-light.svg').default}
            />
          </div>
        </ContentBlock>

        <ContentBlock animate l>
          <div className='contentblock-text'>
            <h2>Gestion des résidents</h2>
            <p>
            Suivez facilement les informations clés de chaque résident, tels que les coordonnées, les paiements et les demandes de maintenance. Notre interface conviviale vous permet d'accéder rapidement à toutes les informations nécessaires.
            </p>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/illustrations/podium-dark.svg').default
              :
              require('../assets/illustrations/podium-light.svg').default}
            />
          </div>
        </ContentBlock>

        <div className='supportblock'>
          <h2>Découvrez la simplicité de la gestion de votre syndic.
</h2>
          <p>
          Inscrivez-vous dès maintenant pour une démonstration gratuite.
          </p>




<div className='supportblock-actions'>
            <PrimaryButton text="Inscrivez-vous!" border ext destination="http:localhost:8000/register" arrow />
          </div>
        </div>

      </main>
    </>
  );
}

export default Home;