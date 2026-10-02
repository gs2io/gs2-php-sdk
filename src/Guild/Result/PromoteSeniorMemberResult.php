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
use Gs2\Guild\Model\LastGuildMasterActivity;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;

/**
 * Result of promoteSeniorMember: Promote the most senior guild member to guild master if the guild master has not logged in for a certain period of time
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#promoteseniormember
 */
class PromoteSeniorMemberResult implements IResult {
    /** @var LastGuildMasterActivity Last Guild Master Activity */
    private $item;
    /** @var Guild Guild */
    private $guild;

    /** @return LastGuildMasterActivity|null Last Guild Master Activity */
	public function getItem(): ?LastGuildMasterActivity {
		return $this->item;
	}

    /** @param LastGuildMasterActivity|null $item Last Guild Master Activity */
	public function setItem(?LastGuildMasterActivity $item) {
		$this->item = $item;
	}

    /**
     * @param LastGuildMasterActivity|null $item Last Guild Master Activity
     * @return PromoteSeniorMemberResult
     */
	public function withItem(?LastGuildMasterActivity $item): PromoteSeniorMemberResult {
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
     * @return PromoteSeniorMemberResult
     */
	public function withGuild(?Guild $guild): PromoteSeniorMemberResult {
		$this->guild = $guild;
		return $this;
	}

    public static function fromJson(?array $data): ?PromoteSeniorMemberResult {
        if ($data === null) {
            return null;
        }
        return (new PromoteSeniorMemberResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? LastGuildMasterActivity::fromJson($data['item']) : null)
            ->withGuild(array_key_exists('guild', $data) && $data['guild'] !== null ? Guild::fromJson($data['guild']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "guild" => $this->getGuild() !== null ? $this->getGuild()->toJson() : null,
        );
    }
}