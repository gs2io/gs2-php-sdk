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
 * 見出し
 *
 * @author Game Server Services, Inc.
 *
 */
class Toc implements IModel {
	/**
     * @var string 見出し
	 */
	protected $tocId;

	/**
	 * 見出しを取得
	 *
	 * @return string|null 見出し
	 */
	public function getTocId(): ?string {
		return $this->tocId;
	}

	/**
	 * 見出しを設定
	 *
	 * @param string|null $tocId 見出し
	 */
	public function setTocId(?string $tocId) {
		$this->tocId = $tocId;
	}

	/**
	 * 見出しを設定
	 *
	 * @param string|null $tocId 見出し
	 * @return Toc $this
	 */
	public function withTocId(?string $tocId): Toc {
		$this->tocId = $tocId;
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
	 * @return Toc $this
	 */
	public function withUserId(?string $userId): Toc {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int インデックス
	 */
	protected $index;

	/**
	 * インデックスを取得
	 *
	 * @return int|null インデックス
	 */
	public function getIndex(): ?int {
		return $this->index;
	}

	/**
	 * インデックスを設定
	 *
	 * @param int|null $index インデックス
	 */
	public function setIndex(?int $index) {
		$this->index = $index;
	}

	/**
	 * インデックスを設定
	 *
	 * @param int|null $index インデックス
	 * @return Toc $this
	 */
	public function withIndex(?int $index): Toc {
		$this->index = $index;
		return $this;
	}
	/**
     * @var Entry[] エントリーのリスト
	 */
	protected $entries;

	/**
	 * エントリーのリストを取得
	 *
	 * @return Entry[]|null エントリーのリスト
	 */
	public function getEntries(): ?array {
		return $this->entries;
	}

	/**
	 * エントリーのリストを設定
	 *
	 * @param Entry[]|null $entries エントリーのリスト
	 */
	public function setEntries(?array $entries) {
		$this->entries = $entries;
	}

	/**
	 * エントリーのリストを設定
	 *
	 * @param Entry[]|null $entries エントリーのリスト
	 * @return Toc $this
	 */
	public function withEntries(?array $entries): Toc {
		$this->entries = $entries;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Toc $this
	 */
	public function withCreatedAt(?int $createdAt): Toc {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Toc $this
	 */
	public function withUpdatedAt(?int $updatedAt): Toc {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "tocId" => $this->tocId,
            "userId" => $this->userId,
            "index" => $this->index,
            "entries" => array_map(
                function (Entry $v) {
                    return $v->toJson();
                },
                $this->entries == null ? [] : $this->entries
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Toc {
        $model = new Toc();
        $model->setTocId(isset($data["tocId"]) ? $data["tocId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setIndex(isset($data["index"]) ? $data["index"] : null);
        $model->setEntries(array_map(
                function ($v) {
                    return Entry::fromJson($v);
                },
                isset($data["entries"]) ? $data["entries"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}