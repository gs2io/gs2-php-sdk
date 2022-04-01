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

namespace Gs2\Key\Result;

use Gs2\Core\Model\IResult;

class DecryptResult implements IResult {
    /** @var string */
    private $data;

	public function getData(): ?string {
		return $this->data;
	}

	public function setData(?string $data) {
		$this->data = $data;
	}

	public function withData(?string $data): DecryptResult {
		$this->data = $data;
		return $this;
	}

    public static function fromJson(?array $data): ?DecryptResult {
        if ($data === null) {
            return null;
        }
        return (new DecryptResult())
            ->withData(array_key_exists('data', $data) && $data['data'] !== null ? $data['data'] : null);
    }

    public function toJson(): array {
        return array(
            "data" => $this->getData(),
        );
    }
}