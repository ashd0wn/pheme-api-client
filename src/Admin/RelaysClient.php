<?php
declare(strict_types=1);

namespace Pheme\Api\Admin;

use Pheme\Api\AbstractClient;
use Pheme\Api\Dto;
use Pheme\Api\Exception;

class RelaysClient extends AbstractClient
{
    /**
     * @return Dto\AdminRelayDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $relays = $this->request('GET', 'internal/relays');

        $return = [];
        foreach ($relays as $relay) {
            $return[] = Dto\AdminRelayDto::fromArray($relay);
        }

        return $return;
    }

    /**
     * @param Dto\AdminRelayUpdateDto $dto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(Dto\AdminRelayUpdateDto $dto): void
    {
        $this->request('POST', 'internal/relays', [
            'json' => $dto,
        ]);
    }

}
