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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


class InGameLogTag implements IModel {
	/**
     * @var string
	 */
	private $key;
	/**
     * @var string
	 */
	private $value;
	public function getKey(): ?string {
		return $this->key;
	}
	public function setKey(?string $key) {
		$this->key = $key;
	}
	public function withKey(?string $key): InGameLogTag {
		$this->key = $key;
		return $this;
	}
	public function getValue(): ?string {
		return $this->value;
	}
	public function setValue(?string $value) {
		$this->value = $value;
	}
	public function withValue(?string $value): InGameLogTag {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?InGameLogTag {
        if ($data === null) {
            return null;
        }
        return (new InGameLogTag())
            ->withKey(array_key_exists('key', $data) && $data['key'] !== null ? $data['key'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "key" => $this->getKey(),
            "value" => $this->getValue(),
        );
    }
}