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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペース名
	 */
	protected $name;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string ランクキャップ取得時 に実行されるスクリプト のGRN
	 */
	protected $experienceCapScriptId;

	/**
	 * ランクキャップ取得時 に実行されるスクリプト のGRNを取得
	 *
	 * @return string|null ランクキャップ取得時 に実行されるスクリプト のGRN
	 */
	public function getExperienceCapScriptId(): ?string {
		return $this->experienceCapScriptId;
	}

	/**
	 * ランクキャップ取得時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $experienceCapScriptId ランクキャップ取得時 に実行されるスクリプト のGRN
	 */
	public function setExperienceCapScriptId(?string $experienceCapScriptId) {
		$this->experienceCapScriptId = $experienceCapScriptId;
	}

	/**
	 * ランクキャップ取得時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $experienceCapScriptId ランクキャップ取得時 に実行されるスクリプト のGRN
	 * @return Namespace_ $this
	 */
	public function withExperienceCapScriptId(?string $experienceCapScriptId): Namespace_ {
		$this->experienceCapScriptId = $experienceCapScriptId;
		return $this;
	}
	/**
     * @var ScriptSetting 経験値変化したときに実行するスクリプト
	 */
	protected $changeExperienceScript;

	/**
	 * 経験値変化したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 経験値変化したときに実行するスクリプト
	 */
	public function getChangeExperienceScript(): ?ScriptSetting {
		return $this->changeExperienceScript;
	}

	/**
	 * 経験値変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeExperienceScript 経験値変化したときに実行するスクリプト
	 */
	public function setChangeExperienceScript(?ScriptSetting $changeExperienceScript) {
		$this->changeExperienceScript = $changeExperienceScript;
	}

	/**
	 * 経験値変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeExperienceScript 経験値変化したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): Namespace_ {
		$this->changeExperienceScript = $changeExperienceScript;
		return $this;
	}
	/**
     * @var ScriptSetting ランク変化したときに実行するスクリプト
	 */
	protected $changeRankScript;

	/**
	 * ランク変化したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ランク変化したときに実行するスクリプト
	 */
	public function getChangeRankScript(): ?ScriptSetting {
		return $this->changeRankScript;
	}

	/**
	 * ランク変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeRankScript ランク変化したときに実行するスクリプト
	 */
	public function setChangeRankScript(?ScriptSetting $changeRankScript) {
		$this->changeRankScript = $changeRankScript;
	}

	/**
	 * ランク変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeRankScript ランク変化したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withChangeRankScript(?ScriptSetting $changeRankScript): Namespace_ {
		$this->changeRankScript = $changeRankScript;
		return $this;
	}
	/**
     * @var ScriptSetting ランクキャップ変化したときに実行するスクリプト
	 */
	protected $changeRankCapScript;

	/**
	 * ランクキャップ変化したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ランクキャップ変化したときに実行するスクリプト
	 */
	public function getChangeRankCapScript(): ?ScriptSetting {
		return $this->changeRankCapScript;
	}

	/**
	 * ランクキャップ変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeRankCapScript ランクキャップ変化したときに実行するスクリプト
	 */
	public function setChangeRankCapScript(?ScriptSetting $changeRankCapScript) {
		$this->changeRankCapScript = $changeRankCapScript;
	}

	/**
	 * ランクキャップ変化したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $changeRankCapScript ランクキャップ変化したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): Namespace_ {
		$this->changeRankCapScript = $changeRankCapScript;
		return $this;
	}
	/**
     * @var ScriptSetting 経験値あふれしたときに実行するスクリプト
	 */
	protected $overflowExperienceScript;

	/**
	 * 経験値あふれしたときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 経験値あふれしたときに実行するスクリプト
	 */
	public function getOverflowExperienceScript(): ?ScriptSetting {
		return $this->overflowExperienceScript;
	}

	/**
	 * 経験値あふれしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $overflowExperienceScript 経験値あふれしたときに実行するスクリプト
	 */
	public function setOverflowExperienceScript(?ScriptSetting $overflowExperienceScript) {
		$this->overflowExperienceScript = $overflowExperienceScript;
	}

	/**
	 * 経験値あふれしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $overflowExperienceScript 経験値あふれしたときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withOverflowExperienceScript(?ScriptSetting $overflowExperienceScript): Namespace_ {
		$this->overflowExperienceScript = $overflowExperienceScript;
		return $this;
	}
	/**
     * @var LogSetting ログの出力設定
	 */
	protected $logSetting;

	/**
	 * ログの出力設定を取得
	 *
	 * @return LogSetting|null ログの出力設定
	 */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 * @return Namespace_ $this
	 */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
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
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
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
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "experienceCapScriptId" => $this->experienceCapScriptId,
            "changeExperienceScript" => $this->changeExperienceScript->toJson(),
            "changeRankScript" => $this->changeRankScript->toJson(),
            "changeRankCapScript" => $this->changeRankCapScript->toJson(),
            "overflowExperienceScript" => $this->overflowExperienceScript->toJson(),
            "logSetting" => $this->logSetting->toJson(),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setExperienceCapScriptId(isset($data["experienceCapScriptId"]) ? $data["experienceCapScriptId"] : null);
        $model->setChangeExperienceScript(isset($data["changeExperienceScript"]) ? ScriptSetting::fromJson($data["changeExperienceScript"]) : null);
        $model->setChangeRankScript(isset($data["changeRankScript"]) ? ScriptSetting::fromJson($data["changeRankScript"]) : null);
        $model->setChangeRankCapScript(isset($data["changeRankCapScript"]) ? ScriptSetting::fromJson($data["changeRankCapScript"]) : null);
        $model->setOverflowExperienceScript(isset($data["overflowExperienceScript"]) ? ScriptSetting::fromJson($data["overflowExperienceScript"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}