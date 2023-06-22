import { Helmet } from 'react-helmet';
import { useLocation, useOutletContext } from 'react-router-dom';
import { PrimaryButton, ContentBlock, Tag,ContentFullsizeBlock } from '../components/Elements';
import Header from '../components/Header';
import { Logo } from '../components/Symbols';
import config from '../config.json';
import ContactForm from '../components/ContactUs';

function Content() {
  const DiscordIcon = require('../assets/social-icons/discord.svg').ReactComponent,
  TwitterIcon = require('../assets/social-icons/twitter.svg').ReactComponent,
  GitHubIcon = require('../assets/social-icons/github.svg').ReactComponent,
  YouTubeIcon = require('../assets/social-icons/youtube.svg').ReactComponent,
  LinkedInIcon = require('../assets/social-icons/linkedin.svg').ReactComponent;
  const [theme] = useOutletContext(),
    loc = useLocation();
  return (
    <>
      <Helmet>
        <title>Content | GSyndic</title>
        <link rel="canonical" href={`https://community-architects.net${loc.pathname}`} />
      </Helmet>
      <Header>
      <div>
          <h1>Qui Sommes Nous?!</h1>
          <p> Nous sommes une équipe de développeurs passionnés de deuxième année de l'ISMO (Institut Supérieur des Métiers de L'Offshoring) avec une spécialisation en développement Full Stack Web. Forts de notre formation et de notre expérience, nous sommes déterminés à créer des applications web de gestion de syndic de haute qualité.

</p>
        </div>
      </Header>
      <main>
      <ContentFullsizeBlock>
            {/* <IconModerator className="application-icon mod" /> */}
            <h2 style={{ color: "var(--color-text-application-mod)" }}>Équipe</h2>
            <p>
            Notre équipe combine des compétences en développement front-end et back-end pour concevoir des solutions efficaces et conviviales. Nous sommes constamment à l'affût des dernières technologies et des meilleures pratiques de développement pour garantir des résultats performants et adaptés aux besoins spécifiques de la gestion de syndic.



            </p>
            <p>
            Nous comprenons les défis auxquels sont confrontés les syndics et nous nous efforçons de simplifier leurs processus de gestion. Notre objectif est de fournir une application web intuitive et complète qui facilite la communication, la planification et la gestion des tâches, permettant ainsi aux syndics de gagner du temps et d'améliorer leur efficacité.
            </p>
            </ContentFullsizeBlock>
            <ContentBlock animate>
          <div className='contentblock-text'>
            <div className='contentblock-tagrow'>
              <h2>CHERTI OMAR</h2>
              <Tag color="red">Full Stack Web Developer</Tag>
            </div>
            <p>
            Passionné et polyvalent qui a su réorienter sa carrière avec succès. Avec un bagage initial en finance, Omar a entrepris une reconversion audacieuse dans le domaine du développement web. Grâce à sa détermination et à sa volonté d'apprendre, il a acquis une expertise solide en langages front-end tels que HTML, CSS et JavaScript, ainsi qu'en frameworks modernes comme React et Angular. Du côté du développement back-end, Omar s'est spécialisé dans des langages comme Python et Node.js, tout en développant des compétences en gestion de bases de données. Sa combinaison unique de connaissances en finance et en développement web lui permet de créer des applications web complètes, intuitives et adaptées aux besoins spécifiques du secteur financier. Omar est un exemple inspirant de reconversion réussie et démontre la volonté d'évoluer et d'explorer de nouvelles opportunités professionnelles.            </p>
            {/* <div className='contentblock-actions'>
              <PrimaryButton text="Watch Video" ext destination="https://www.youtube.com/watch?v=nefJID_9Jug" arrow />
            </div> */}
            <div className='socials'>
          <a title='Twitter' href="https://twitter.com/omarch94" target="_blank" rel='noreferrer'>
            <TwitterIcon className='social-icon' />
          </a>
          <a title='GitHub' href="https://github.com/omarch94" target="_blank" rel='noreferrer'>
            <GitHubIcon className='social-icon' />
          </a>
         
          <a title='LinkedIn' href="https://www.linkedin.com/in/omar-cherti-746a43158/" target="_blank" rel='noreferrer'>
            <LinkedInIcon className='social-icon' />
          </a>
        </div>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch1' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/content/omarcherti.png')
              :
              require('../assets/content/omarcherti.png')}
            />
          </div>
        </ContentBlock>

        <ContentBlock animate>
          <div className='contentblock-image'>
            <img className='no-touch1' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/content/adamFoto.png')
              :
              require('../assets/content/adamFoto.png')}
            />
          </div>
        
       <div className='contentblock-text'>
            <div className='contentblock-tagrow'>
              <h2>BENAYIBA ADAM</h2>
              <Tag color="green">Full Stack Web Developer</Tag>
            </div>
            <p>
              We will be discussing the language of disability as well
              as bringing awareness with your community interactions.
            </p>
            <div className='socials'>
         
         <a title='Twitter' href="https://twitter.com/" target="_blank" rel='noreferrer'>
           <TwitterIcon className='social-icon' />
         </a>
         <a title='GitHub' href="https://github.com/adambenajiba" target="_blank" rel='noreferrer'>
           <GitHubIcon className='social-icon' />
         </a>
       
         <a title='LinkedIn' href="https://www.linkedin.com/" target="_blank" rel='noreferrer'>
           <LinkedInIcon className='social-icon' />
         </a>
       </div>
       
          </div>
          
         
        </ContentBlock>

        <ContentBlock animate>
          <div className='contentblock-text'>
            <div className='contentblock-tagrow'>
              <h2>LAZIBA JIHAD</h2>
              <Tag color="red">Full Stack Web Developer</Tag>
            </div>
            <p>
              We will be discussing the language of disability as well
              as bringing awareness with your community interactions.
            </p>
           
            <div className='socials'>
         
          <a title='Twitter' href="https://twitter.com/" target="_blank" rel='noreferrer'>
            <TwitterIcon className='social-icon' />
          </a>
          <a title='GitHub' href="https://github.com/jihadlaziba" target="_blank" rel='noreferrer'>
            <GitHubIcon className='social-icon' />
          </a>
        
          <a title='LinkedIn' href="https://www.linkedin.com/jihadlaziba" target="_blank" rel='noreferrer'>
            <LinkedInIcon className='social-icon' />
          </a>
        </div>
          </div>
          <div className='contentblock-image'>
            <img className='no-touch1' draggable={false} alt='' src={theme === 'dark' ?
              require('../assets/content/JihadFoto.png')
              :
              require('../assets/content/JihadFoto.png')}
            />
          </div>
        </ContentBlock>


      </main>
    </>
  );
}

export default Content;