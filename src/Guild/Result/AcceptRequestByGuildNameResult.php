<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Guild\Result;

use Gs2\Core\Model\IResult;
use Gs2\Guild\Model\ReceiveMemberRequest;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;

/**
 * Result of acceptRequestByGuildName: Accept join request by specifying a Guild name
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#acceptrequestbyguildname
 */
class AcceptRequestByGuildNameResult implements IResult {
    /** @var ReceiveMemberRequest Accepted join request */
    private $item;
    /** @var Guild Guild */
    private $guild;

    /** @return ReceiveMemberRequest|null Accepted join request */
	public function getItem(): ?ReceiveMemberRequest {
		return $this->item;
	}

    /** @param ReceiveMemberRequest|null $item Accepted join request */
	public function setItem(?ReceiveMemberRequest $item) {
		$this->item = $item;
	}

    /**
     * @param ReceiveMemberRequest|null $item Accepted join request
     * @return AcceptRequestByGuildNameResult
     */
	public function withItem(?ReceiveMemberRequest $item): AcceptRequestByGuildNameResult {
		$this->item = $item;
		return $this;
	}

    /** @return Guild|null Guild */
	public function getGuild(): ?Guild {
		return $this->guild;
	}

    /** @param Guild|null $guild Guild */
	public function setGuild(?Guild $guild) {
		$this->guild = $guild;
	}

    /**
     * @param Guild|null $guild Guild
     * @return AcceptRequestByGuildNameResult
     */
	public function withGuild(?Guild $guild): AcceptRequestByGuildNameResult {
		$this->guild = $guild;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptRequestByGuildNameResult {
        if ($data === null) {
            return null;
        }
        return (new AcceptRequestByGuildNameResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ReceiveMemberRequest::fromJson($data['item']) : null)
            ->withGuild(array_key_exists('guild', $data) && $data['guild'] !== null ? Guild::fromJson($data['guild']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "guild" => $this->getGuild() !== null ? $this->getGuild()->toJson() : null,
        );
    }
}