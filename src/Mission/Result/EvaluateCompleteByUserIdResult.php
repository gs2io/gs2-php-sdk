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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\Complete;

class EvaluateCompleteByUserIdResult implements IResult {
    /** @var Complete */
    private $item;

	public function getItem(): ?Complete {
		return $this->item;
	}

	public function setItem(?Complete $item) {
		$this->item = $item;
	}

	public function withItem(?Complete $item): EvaluateCompleteByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?EvaluateCompleteByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new EvaluateCompleteByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Complete::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}