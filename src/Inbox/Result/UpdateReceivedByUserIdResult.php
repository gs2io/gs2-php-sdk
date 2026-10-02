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

namespace Gs2\Inbox\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inbox\Model\Received;

/**
 * Result of updateReceivedByUserId: Update Received Global Message by User ID
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatereceivedbyuserid
 */
class UpdateReceivedByUserIdResult implements IResult {
    /** @var Received Received Global Message updated */
    private $item;

    /** @return Received|null Received Global Message updated */
	public function getItem(): ?Received {
		return $this->item;
	}

    /** @param Received|null $item Received Global Message updated */
	public function setItem(?Received $item) {
		$this->item = $item;
	}

    /**
     * @param Received|null $item Received Global Message updated
     * @return UpdateReceivedByUserIdResult
     */
	public function withItem(?Received $item): UpdateReceivedByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateReceivedByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateReceivedByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Received::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}