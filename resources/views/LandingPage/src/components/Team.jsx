// import React from 'react';
// import valorantImage from '../assets/content/valorant-light.png';

// const TeamMember = ({ name, role, description, image ,socialLinks}) => {
//   return (
//     <div className="team-member">
//       <div className='imageMember'>

//       <img src={image} alt={name} className="member-image" />
//       </div>
//       <h3 className="member-name">{name}</h3>
//       <h4 className="member-role">{role}</h4>

//       <p className="member-description">{description}</p>
//       <div className="social-links">
//         {socialLinks?.map((link, index) => (
//           <a href={link.url} key={index} target="_blank" rel="noopener noreferrer">
//             <img src={link.icon} alt={link.name} className="social-icon" />
//           </a>
//         ))}
//       </div>
//     </div>
//   );
// };

// const MeetTheTeam = () => {
//   const teamMembers = [
//     {
//       name: 'Cherti Omar',
//       role: 'Full Stack Developer',
//       description: 'John is an experienced developer with a passion for creating user-friendly web applications.',
//       image: valorantImage,
//       socialLinks: [
//         {
//           name: 'LinkedIn',
//           url: 'https://www.linkedin.com/omarch94',
//           icon: 'linkedin.png',
//         },
//         {
//           name: 'Twitter',
//           url: 'https://twitter.com/johndoe',
//           icon: 'twitter.png',
//         },
//       ],
//     },
//     {
//       name: 'Benayiba Adam',
//       role: 'Full Stack Developer',
//       description: 'Jane has a keen eye for design and specializes in creating visually appealing and intuitive interfaces.',
//       image: valorantImage,
//       socialLinks: [
//         {
//           name: 'LinkedIn',
//           url: 'https://www.linkedin.com/johndoe',
//           icon: 'linkedin.png',
//         },
//         {
//           name: 'Twitter',
//           url: 'https://twitter.com/johndoe',
//           icon: 'twitter.png',
//         },
//       ],
//     },
//     {
//       name: 'Laziba Jihad',
//       role: 'Full Stack Developer',
//       description: 'Jane has a keen eye for design and specializes in creating visually appealing and intuitive interfaces.',
//       image: valorantImage,
//       socialLinks: [
//         {
//           name: 'LinkedIn',
//           url: 'https://www.linkedin.com/johndoe',
//           icon: 'linkedin.png',
//         },
//         {
//           name: 'Twitter',
//           url: 'https://twitter.com/johndoe',
//           icon: 'twitter.png',
//         },
//       ],
//     },
//     // Add more team members here
//   ];

//   return (
//     <div className="meet-the-team">
//       <h2>Meet the Team</h2>
//       {teamMembers.map((member, index) => (
//         <div className="team-member-container" key={index}>
//           <TeamMember
//             name={member.name}
//             role={member.role}
//             description={member.description}
//             image={member.image}
//             socialLinks={member.socialLinks}
//           />
//         </div>
//       ))}
//     </div>
//   );
// };

// export default MeetTheTeam;
