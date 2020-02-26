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
 * ニュース記事
 *
 * @author Game Server Services, Inc.
 *
 */
class SetCookieRequestEntry implements IModel {
	/**
     * @var string 記事を閲覧できるようにするために設定してほしい Cookie のキー値
	 */
	protected $key;

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie のキー値を取得
	 *
	 * @return string|null 記事を閲覧できるようにするために設定してほしい Cookie のキー値
	 */
	public function getKey(): ?string {
		return $this->key;
	}

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie のキー値を設定
	 *
	 * @param string|null $key 記事を閲覧できるようにするために設定してほしい Cookie のキー値
	 */
	public function setKey(?string $key) {
		$this->key = $key;
	}

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie のキー値を設定
	 *
	 * @param string|null $key 記事を閲覧できるようにするために設定してほしい Cookie のキー値
	 * @return SetCookieRequestEntry $this
	 */
	public function withKey(?string $key): SetCookieRequestEntry {
		$this->key = $key;
		return $this;
	}
	/**
     * @var string 記事を閲覧できるようにするために設定してほしい Cookie の値
	 */
	protected $value;

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie の値を取得
	 *
	 * @return string|null 記事を閲覧できるようにするために設定してほしい Cookie の値
	 */
	public function getValue(): ?string {
		return $this->value;
	}

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie の値を設定
	 *
	 * @param string|null $value 記事を閲覧できるようにするために設定してほしい Cookie の値
	 */
	public function setValue(?string $value) {
		$this->value = $value;
	}

	/**
	 * 記事を閲覧できるようにするために設定してほしい Cookie の値を設定
	 *
	 * @param string|null $value 記事を閲覧できるようにするために設定してほしい Cookie の値
	 * @return SetCookieRequestEntry $this
	 */
	public function withValue(?string $value): SetCookieRequestEntry {
		$this->value = $value;
		return $this;
	}

    public function toJson(): array {
        return array(
            "key" => $this->key,
            "value" => $this->value,
        );
    }

    public static function fromJson(array $data): SetCookieRequestEntry {
        $model = new SetCookieRequestEntry();
        $model->setKey(isset($data["key"]) ? $data["key"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        return $model;
    }
}