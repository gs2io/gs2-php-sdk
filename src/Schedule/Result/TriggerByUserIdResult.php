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

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\Trigger;

/**
 * Result of triggerByUserId: Execute the Trigger by User ID
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#triggerbyuserid
 */
class TriggerByUserIdResult implements IResult {
    /** @var Trigger Pulled Trigger */
    private $item;

    /** @return Trigger|null Pulled Trigger */
	public function getItem(): ?Trigger {
		return $this->item;
	}

    /** @param Trigger|null $item Pulled Trigger */
	public function setItem(?Trigger $item) {
		$this->item = $item;
	}

    /**
     * @param Trigger|null $item Pulled Trigger
     * @return TriggerByUserIdResult
     */
	public function withItem(?Trigger $item): TriggerByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?TriggerByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new TriggerByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Trigger::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}