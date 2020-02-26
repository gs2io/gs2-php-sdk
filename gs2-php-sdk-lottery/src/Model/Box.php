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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;

/**
 * ボックス
 *
 * @author Game Server Services, Inc.
 *
 */
class Box implements IModel {
	/**
     * @var string ボックス
	 */
	protected $boxId;

	/**
	 * ボックスを取得
	 *
	 * @return string|null ボックス
	 */
	public function getBoxId(): ?string {
		return $this->boxId;
	}

	/**
	 * ボックスを設定
	 *
	 * @param string|null $boxId ボックス
	 */
	public function setBoxId(?string $boxId) {
		$this->boxId = $boxId;
	}

	/**
	 * ボックスを設定
	 *
	 * @param string|null $boxId ボックス
	 * @return Box $this
	 */
	public function withBoxId(?string $boxId): Box {
		$this->boxId = $boxId;
		return $this;
	}
	/**
     * @var string 排出確率テーブル名
	 */
	protected $prizeTableName;

	/**
	 * 排出確率テーブル名を取得
	 *
	 * @return string|null 排出確率テーブル名
	 */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブル名
	 */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブル名
	 * @return Box $this
	 */
	public function withPrizeTableName(?string $prizeTableName): Box {
		$this->prizeTableName = $prizeTableName;
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
	 * @return Box $this
	 */
	public function withUserId(?string $userId): Box {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int[] 排出済み景品のインデックスのリスト
	 */
	protected $drawnIndexes;

	/**
	 * 排出済み景品のインデックスのリストを取得
	 *
	 * @return int[]|null 排出済み景品のインデックスのリスト
	 */
	public function getDrawnIndexes(): ?array {
		return $this->drawnIndexes;
	}

	/**
	 * 排出済み景品のインデックスのリストを設定
	 *
	 * @param int[]|null $drawnIndexes 排出済み景品のインデックスのリスト
	 */
	public function setDrawnIndexes(?array $drawnIndexes) {
		$this->drawnIndexes = $drawnIndexes;
	}

	/**
	 * 排出済み景品のインデックスのリストを設定
	 *
	 * @param int[]|null $drawnIndexes 排出済み景品のインデックスのリスト
	 * @return Box $this
	 */
	public function withDrawnIndexes(?array $drawnIndexes): Box {
		$this->drawnIndexes = $drawnIndexes;
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
	 * @return Box $this
	 */
	public function withCreatedAt(?int $createdAt): Box {
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
	 * @return Box $this
	 */
	public function withUpdatedAt(?int $updatedAt): Box {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "boxId" => $this->boxId,
            "prizeTableName" => $this->prizeTableName,
            "userId" => $this->userId,
            "drawnIndexes" => $this->drawnIndexes,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Box {
        $model = new Box();
        $model->setBoxId(isset($data["boxId"]) ? $data["boxId"] : null);
        $model->setPrizeTableName(isset($data["prizeTableName"]) ? $data["prizeTableName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setDrawnIndexes(isset($data["drawnIndexes"]) ? $data["drawnIndexes"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}