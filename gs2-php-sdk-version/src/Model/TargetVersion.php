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
 * 検証するバージョン
 *
 * @author Game Server Services, Inc.
 *
 */
class TargetVersion implements IModel {
	/**
     * @var string バージョンの名前
	 */
	protected $versionName;

	/**
	 * バージョンの名前を取得
	 *
	 * @return string|null バージョンの名前
	 */
	public function getVersionName(): ?string {
		return $this->versionName;
	}

	/**
	 * バージョンの名前を設定
	 *
	 * @param string|null $versionName バージョンの名前
	 */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	/**
	 * バージョンの名前を設定
	 *
	 * @param string|null $versionName バージョンの名前
	 * @return TargetVersion $this
	 */
	public function withVersionName(?string $versionName): TargetVersion {
		$this->versionName = $versionName;
		return $this;
	}
	/**
     * @var Version バージョン
	 */
	protected $version;

	/**
	 * バージョンを取得
	 *
	 * @return Version|null バージョン
	 */
	public function getVersion(): ?Version {
		return $this->version;
	}

	/**
	 * バージョンを設定
	 *
	 * @param Version|null $version バージョン
	 */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	/**
	 * バージョンを設定
	 *
	 * @param Version|null $version バージョン
	 * @return TargetVersion $this
	 */
	public function withVersion(?Version $version): TargetVersion {
		$this->version = $version;
		return $this;
	}
	/**
     * @var string ボディ
	 */
	protected $body;

	/**
	 * ボディを取得
	 *
	 * @return string|null ボディ
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * ボディを設定
	 *
	 * @param string|null $body ボディ
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * ボディを設定
	 *
	 * @param string|null $body ボディ
	 * @return TargetVersion $this
	 */
	public function withBody(?string $body): TargetVersion {
		$this->body = $body;
		return $this;
	}
	/**
     * @var string 署名
	 */
	protected $signature;

	/**
	 * 署名を取得
	 *
	 * @return string|null 署名
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature 署名
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature 署名
	 * @return TargetVersion $this
	 */
	public function withSignature(?string $signature): TargetVersion {
		$this->signature = $signature;
		return $this;
	}

    public function toJson(): array {
        return array(
            "versionName" => $this->versionName,
            "version" => $this->version->toJson(),
            "body" => $this->body,
            "signature" => $this->signature,
        );
    }

    public static function fromJson(array $data): TargetVersion {
        $model = new TargetVersion();
        $model->setVersionName(isset($data["versionName"]) ? $data["versionName"] : null);
        $model->setVersion(isset($data["version"]) ? Version::fromJson($data["version"]) : null);
        $model->setBody(isset($data["body"]) ? $data["body"] : null);
        $model->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $model;
    }
}