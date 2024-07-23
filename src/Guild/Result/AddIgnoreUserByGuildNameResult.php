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
use Gs2\Guild\Model\IgnoreUser;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;

class AddIgnoreUserByGuildNameResult implements IResult {
    /** @var IgnoreUser */
    private $item;
    /** @var Guild */
    private $guild;

	public function getItem(): ?IgnoreUser {
		return $this->item;
	}

	public function setItem(?IgnoreUser $item) {
		$this->item = $item;
	}

	public function withItem(?IgnoreUser $item): AddIgnoreUserByGuildNameResult {
		$this->item = $item;
		return $this;
	}

	public function getGuild(): ?Guild {
		return $this->guild;
	}

	public function setGuild(?Guild $guild) {
		$this->guild = $guild;
	}

	public function withGuild(?Guild $guild): AddIgnoreUserByGuildNameResult {
		$this->guild = $guild;
		return $this;
	}

    public static function fromJson(?array $data): ?AddIgnoreUserByGuildNameResult {
        if ($data === null) {
            return null;
        }
        return (new AddIgnoreUserByGuildNameResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? IgnoreUser::fromJson($data['item']) : null)
            ->withGuild(array_key_exists('guild', $data) && $data['guild'] !== null ? Guild::fromJson($data['guild']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "guild" => $this->getGuild() !== null ? $this->getGuild()->toJson() : null,
        );
    }
}