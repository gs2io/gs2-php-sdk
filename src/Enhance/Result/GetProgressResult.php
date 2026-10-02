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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\Progress;

/**
 * Result of getProgress: Retrieve running enhancements
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#getprogress
 */
class GetProgressResult implements IResult {
    /** @var Progress Progress information for the enhancement currently in the running */
    private $item;

    /** @return Progress|null Progress information for the enhancement currently in the running */
	public function getItem(): ?Progress {
		return $this->item;
	}

    /** @param Progress|null $item Progress information for the enhancement currently in the running */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

    /**
     * @param Progress|null $item Progress information for the enhancement currently in the running
     * @return GetProgressResult
     */
	public function withItem(?Progress $item): GetProgressResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProgressResult {
        if ($data === null) {
            return null;
        }
        return (new GetProgressResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Progress::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}