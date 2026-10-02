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

namespace Gs2\News\Model;

use Gs2\Core\Model\IModel;


/**
 * Set Cookie Request Entry
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#setcookierequestentry
 */
class SetCookieRequestEntry implements IModel {
	/**
     * @var string Cookie Key
	 */
	private $key;
	/**
     * @var string Cookie Value
	 */
	private $value;
    /** @return string|null Cookie Key */
	public function getKey(): ?string {
		return $this->key;
	}
    /** @param string|null $key Cookie Key */
	public function setKey(?string $key) {
		$this->key = $key;
	}
    /**
     * @param string|null $key Cookie Key
     * @return SetCookieRequestEntry
     */
	public function withKey(?string $key): SetCookieRequestEntry {
		$this->key = $key;
		return $this;
	}
    /** @return string|null Cookie Value */
	public function getValue(): ?string {
		return $this->value;
	}
    /** @param string|null $value Cookie Value */
	public function setValue(?string $value) {
		$this->value = $value;
	}
    /**
     * @param string|null $value Cookie Value
     * @return SetCookieRequestEntry
     */
	public function withValue(?string $value): SetCookieRequestEntry {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?SetCookieRequestEntry {
        if ($data === null) {
            return null;
        }
        return (new SetCookieRequestEntry())
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