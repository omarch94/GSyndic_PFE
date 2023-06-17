import { Helmet } from 'react-helmet';
import { useLocation } from 'react-router-dom';
import { ContentFullsizeBlock, PrimaryButton } from '../components/Elements';
import Header from '../components/Header';
import { AnimationOnScroll } from 'react-animation-on-scroll';
import MeetTheTeam from '../components/Team';

function Applications() {
  const loc = useLocation();
  return (
    <>
      <Helmet>
        <title>Qui Sommes Nous?  </title>
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

        <AnimationOnScroll offset={0} animateOnce={true} animateIn={'animate__fadeInUp'} duration={.5}>

          <ContentFullsizeBlock>
            {/* <IconModerator className="application-icon mod" /> */}
            <h2 style={{ color: "var(--color-text-application-mod)" }}>Équipe</h2>
            <p>
            Notre équipe combine des compétences en développement front-end et back-end pour concevoir des solutions efficaces et conviviales. Nous sommes constamment à l'affût des dernières technologies et des meilleures pratiques de développement pour garantir des résultats performants et adaptés aux besoins spécifiques de la gestion de syndic.



            </p>
            <p>
            Nous comprenons les défis auxquels sont confrontés les syndics et nous nous efforçons de simplifier leurs processus de gestion. Notre objectif est de fournir une application web intuitive et complète qui facilite la communication, la planification et la gestion des tâches, permettant ainsi aux syndics de gagner du temps et d'améliorer leur efficacité.
            </p>
            {/* <h3 style={{ color: "var(--color-text-application-mod)" }}>Requirements</h3>
            <p>Avec notre expertise et notre engagement envers l'excellence technique, nous sommes prêts à relever les défis et à offrir des solutions innovantes pour répondre aux besoins de gestion de syndic. Faites équipe avec nous et découvrez comment notre application peut simplifier votre quotidien.




</p> */}
            {/* <ul>
              <li>You must be at least 16 years old in order to apply for this moderator position.</li>
              <li>Prior experience in community moderation is not a necessity.</li>
              <li>Prior message activity within the community.</li>
              <li>General familiarity with how the server works and is built up.</li>
            </ul> */}
            {/* <PrimaryButton ext text="Apply Now" destination="https://forms.gle/J4WZPkoxSu9KZhAb9" arrow /> */}
          </ContentFullsizeBlock>

          <ContentFullsizeBlock>
            {/* <IconProfessional className="application-icon professional" /> */}
            <MeetTheTeam/>

            {/* <PrimaryButton ext text="Apply Now" destination="https://forms.gle/YuJwLZkmKktugtWm6" arrow /> */}
          </ContentFullsizeBlock>

          

        </AnimationOnScroll>
      </main>
    </>
  );
}

export default Applications;