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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;

/**
 * エントリー
 *
 * @author Game Server Services, Inc.
 *
 */
class Entry implements IModel {
	/**
     * @var string エントリー のGRN
	 */
	protected $entryId;

	/**
	 * エントリー のGRNを取得
	 *
	 * @return string|null エントリー のGRN
	 */
	public function getEntryId(): ?string {
		return $this->entryId;
	}

	/**
	 * エントリー のGRNを設定
	 *
	 * @param string|null $entryId エントリー のGRN
	 */
	public function setEntryId(?string $entryId) {
		$this->entryId = $entryId;
	}

	/**
	 * エントリー のGRNを設定
	 *
	 * @param string|null $entryId エントリー のGRN
	 * @return Entry $this
	 */
	public function withEntryId(?string $entryId): Entry {
		$this->entryId = $entryId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Entry $this
	 */
	public function withUserId(?string $userId): Entry {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string エントリーの種類名
	 */
	protected $name;

	/**
	 * エントリーの種類名を取得
	 *
	 * @return string|null エントリーの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * エントリーの種類名を設定
	 *
	 * @param string|null $name エントリーの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * エントリーの種類名を設定
	 *
	 * @param string|null $name エントリーの種類名
	 * @return Entry $this
	 */
	public function withName(?string $name): Entry {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int None
	 */
	protected $acquiredAt;

	/**
	 * Noneを取得
	 *
	 * @return int|null None
	 */
	public function getAcquiredAt(): ?int {
		return $this->acquiredAt;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $acquiredAt None
	 */
	public function setAcquiredAt(?int $acquiredAt) {
		$this->acquiredAt = $acquiredAt;
	}

	/**
	 * Noneを設定
	 *
	 * @param int|null $acquiredAt None
	 * @return Entry $this
	 */
	public function withAcquiredAt(?int $acquiredAt): Entry {
		$this->acquiredAt = $acquiredAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "entryId" => $this->entryId,
            "userId" => $this->userId,
            "name" => $this->name,
            "acquiredAt" => $this->acquiredAt,
        );
    }

    public static function fromJson(array $data): Entry {
        $model = new Entry();
        $model->setEntryId(isset($data["entryId"]) ? $data["entryId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setAcquiredAt(isset($data["acquiredAt"]) ? $data["acquiredAt"] : null);
        return $model;
    }
}