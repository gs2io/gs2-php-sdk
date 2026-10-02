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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;
use Gs2\Account\Model\TakeOver;

/**
 * Result of deleteTakeOverByUserIdentifier: Delete Takeover Information by specifying user Identifier
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#deletetakeoverbyuseridentifier
 */
class DeleteTakeOverByUserIdentifierResult implements IResult {
    /** @var TakeOver Takeover Information deleted */
    private $item;

    /** @return TakeOver|null Takeover Information deleted */
	public function getItem(): ?TakeOver {
		return $this->item;
	}

    /** @param TakeOver|null $item Takeover Information deleted */
	public function setItem(?TakeOver $item) {
		$this->item = $item;
	}

    /**
     * @param TakeOver|null $item Takeover Information deleted
     * @return DeleteTakeOverByUserIdentifierResult
     */
	public function withItem(?TakeOver $item): DeleteTakeOverByUserIdentifierResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteTakeOverByUserIdentifierResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteTakeOverByUserIdentifierResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? TakeOver::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}