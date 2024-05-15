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
use Gs2\Guild\Model\CurrentGuildMaster;

class GetCurrentGuildMasterResult implements IResult {
    /** @var CurrentGuildMaster */
    private $item;

	public function getItem(): ?CurrentGuildMaster {
		return $this->item;
	}

	public function setItem(?CurrentGuildMaster $item) {
		$this->item = $item;
	}

	public function withItem(?CurrentGuildMaster $item): GetCurrentGuildMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCurrentGuildMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetCurrentGuildMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentGuildMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}