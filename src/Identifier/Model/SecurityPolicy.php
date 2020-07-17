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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;

/**
 * セキュリティポリシー
 *
 * @author Game Server Services, Inc.
 *
 */
class SecurityPolicy implements IModel {
	/**
     * @var string セキュリティポリシー
	 */
	protected $securityPolicyId;

	/**
	 * セキュリティポリシーを取得
	 *
	 * @return string|null セキュリティポリシー
	 */
	public function getSecurityPolicyId(): ?string {
		return $this->securityPolicyId;
	}

	/**
	 * セキュリティポリシーを設定
	 *
	 * @param string|null $securityPolicyId セキュリティポリシー
	 */
	public function setSecurityPolicyId(?string $securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}

	/**
	 * セキュリティポリシーを設定
	 *
	 * @param string|null $securityPolicyId セキュリティポリシー
	 * @return SecurityPolicy $this
	 */
	public function withSecurityPolicyId(?string $securityPolicyId): SecurityPolicy {
		$this->securityPolicyId = $securityPolicyId;
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
	 * @return SecurityPolicy $this
	 */
	public function withOwnerId(?string $ownerId): SecurityPolicy {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string セキュリティポリシー名
	 */
	protected $name;

	/**
	 * セキュリティポリシー名を取得
	 *
	 * @return string|null セキュリティポリシー名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * セキュリティポリシー名を設定
	 *
	 * @param string|null $name セキュリティポリシー名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * セキュリティポリシー名を設定
	 *
	 * @param string|null $name セキュリティポリシー名
	 * @return SecurityPolicy $this
	 */
	public function withName(?string $name): SecurityPolicy {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string セキュリティポリシーの説明
	 */
	protected $description;

	/**
	 * セキュリティポリシーの説明を取得
	 *
	 * @return string|null セキュリティポリシーの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * セキュリティポリシーの説明を設定
	 *
	 * @param string|null $description セキュリティポリシーの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * セキュリティポリシーの説明を設定
	 *
	 * @param string|null $description セキュリティポリシーの説明
	 * @return SecurityPolicy $this
	 */
	public function withDescription(?string $description): SecurityPolicy {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string ポリシードキュメント
	 */
	protected $policy;

	/**
	 * ポリシードキュメントを取得
	 *
	 * @return string|null ポリシードキュメント
	 */
	public function getPolicy(): ?string {
		return $this->policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string|null $policy ポリシードキュメント
	 */
	public function setPolicy(?string $policy) {
		$this->policy = $policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string|null $policy ポリシードキュメント
	 * @return SecurityPolicy $this
	 */
	public function withPolicy(?string $policy): SecurityPolicy {
		$this->policy = $policy;
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
	 * @return SecurityPolicy $this
	 */
	public function withCreatedAt(?int $createdAt): SecurityPolicy {
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
	 * @return SecurityPolicy $this
	 */
	public function withUpdatedAt(?int $updatedAt): SecurityPolicy {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "securityPolicyId" => $this->securityPolicyId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "policy" => $this->policy,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): SecurityPolicy {
        $model = new SecurityPolicy();
        $model->setSecurityPolicyId(isset($data["securityPolicyId"]) ? $data["securityPolicyId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setPolicy(isset($data["policy"]) ? $data["policy"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}