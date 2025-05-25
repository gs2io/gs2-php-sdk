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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;

class GetServiceVersionResult implements IResult {
    /** @var string */
    private $item;

	public function getItem(): ?string {
		return $this->item;
	}

	public function setItem(?string $item) {
		$this->item = $item;
	}

	public function withItem(?string $item): GetServiceVersionResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetServiceVersionResult {
        if ($data === null) {
            return null;
        }
        return (new GetServiceVersionResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? $data['item'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem(),
        );
    }
}