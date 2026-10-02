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

namespace Gs2\Freeze\Result;

use Gs2\Core\Model\IResult;
use Gs2\Freeze\Model\Output;

/**
 * Result of getOutput: Get stage update progress output
 *
 * @see https://docs.gs2.io/api_reference/freeze/sdk/#getoutput
 */
class GetOutputResult implements IResult {
    /** @var Output Output */
    private $item;

    /** @return Output|null Output */
	public function getItem(): ?Output {
		return $this->item;
	}

    /** @param Output|null $item Output */
	public function setItem(?Output $item) {
		$this->item = $item;
	}

    /**
     * @param Output|null $item Output
     * @return GetOutputResult
     */
	public function withItem(?Output $item): GetOutputResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetOutputResult {
        if ($data === null) {
            return null;
        }
        return (new GetOutputResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Output::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}