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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\Await;

class CreateAwaitByStampSheetResult implements IResult {
    /** @var Await */
    private $item;
    /** @var int */
    private $unlockAt;

	public function getItem(): ?Await {
		return $this->item;
	}

	public function setItem(?Await $item) {
		$this->item = $item;
	}

	public function withItem(?Await $item): CreateAwaitByStampSheetResult {
		$this->item = $item;
		return $this;
	}

	public function getUnlockAt(): ?int {
		return $this->unlockAt;
	}

	public function setUnlockAt(?int $unlockAt) {
		$this->unlockAt = $unlockAt;
	}

	public function withUnlockAt(?int $unlockAt): CreateAwaitByStampSheetResult {
		$this->unlockAt = $unlockAt;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateAwaitByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new CreateAwaitByStampSheetResult())
            ->withItem(empty($data['item']) ? null : Await::fromJson($data['item']))
            ->withUnlockAt(empty($data['unlockAt']) ? null : $data['unlockAt']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "unlockAt" => $this->getUnlockAt(),
        );
    }
}