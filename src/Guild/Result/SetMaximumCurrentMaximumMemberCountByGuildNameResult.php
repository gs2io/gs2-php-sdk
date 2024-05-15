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
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;

class SetMaximumCurrentMaximumMemberCountByGuildNameResult implements IResult {
    /** @var Guild */
    private $item;
    /** @var Guild */
    private $old;

	public function getItem(): ?Guild {
		return $this->item;
	}

	public function setItem(?Guild $item) {
		$this->item = $item;
	}

	public function withItem(?Guild $item): SetMaximumCurrentMaximumMemberCountByGuildNameResult {
		$this->item = $item;
		return $this;
	}

	public function getOld(): ?Guild {
		return $this->old;
	}

	public function setOld(?Guild $old) {
		$this->old = $old;
	}

	public function withOld(?Guild $old): SetMaximumCurrentMaximumMemberCountByGuildNameResult {
		$this->old = $old;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMaximumCurrentMaximumMemberCountByGuildNameResult {
        if ($data === null) {
            return null;
        }
        return (new SetMaximumCurrentMaximumMemberCountByGuildNameResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Guild::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Guild::fromJson($data['old']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
        );
    }
}