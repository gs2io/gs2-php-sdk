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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;

/**
 * バージョン
 *
 * @author Game Server Services, Inc.
 *
 */
class Version implements IModel {
	/**
     * @var int メジャーバージョン
	 */
	protected $major;

	/**
	 * メジャーバージョンを取得
	 *
	 * @return int|null メジャーバージョン
	 */
	public function getMajor(): ?int {
		return $this->major;
	}

	/**
	 * メジャーバージョンを設定
	 *
	 * @param int|null $major メジャーバージョン
	 */
	public function setMajor(?int $major) {
		$this->major = $major;
	}

	/**
	 * メジャーバージョンを設定
	 *
	 * @param int|null $major メジャーバージョン
	 * @return Version $this
	 */
	public function withMajor(?int $major): Version {
		$this->major = $major;
		return $this;
	}
	/**
     * @var int マイナーバージョン
	 */
	protected $minor;

	/**
	 * マイナーバージョンを取得
	 *
	 * @return int|null マイナーバージョン
	 */
	public function getMinor(): ?int {
		return $this->minor;
	}

	/**
	 * マイナーバージョンを設定
	 *
	 * @param int|null $minor マイナーバージョン
	 */
	public function setMinor(?int $minor) {
		$this->minor = $minor;
	}

	/**
	 * マイナーバージョンを設定
	 *
	 * @param int|null $minor マイナーバージョン
	 * @return Version $this
	 */
	public function withMinor(?int $minor): Version {
		$this->minor = $minor;
		return $this;
	}
	/**
     * @var int マイクロバージョン
	 */
	protected $micro;

	/**
	 * マイクロバージョンを取得
	 *
	 * @return int|null マイクロバージョン
	 */
	public function getMicro(): ?int {
		return $this->micro;
	}

	/**
	 * マイクロバージョンを設定
	 *
	 * @param int|null $micro マイクロバージョン
	 */
	public function setMicro(?int $micro) {
		$this->micro = $micro;
	}

	/**
	 * マイクロバージョンを設定
	 *
	 * @param int|null $micro マイクロバージョン
	 * @return Version $this
	 */
	public function withMicro(?int $micro): Version {
		$this->micro = $micro;
		return $this;
	}

    public function toJson(): array {
        return array(
            "major" => $this->major,
            "minor" => $this->minor,
            "micro" => $this->micro,
        );
    }

    public static function fromJson(array $data): Version {
        $model = new Version();
        $model->setMajor(isset($data["major"]) ? $data["major"] : null);
        $model->setMinor(isset($data["minor"]) ? $data["minor"] : null);
        $model->setMicro(isset($data["micro"]) ? $data["micro"] : null);
        return $model;
    }
}