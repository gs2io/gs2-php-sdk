<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

/**
 * セキュリティポリシー
 *
 * @author Game Server Services, Inc.
 *
 */
class SecurityPolicy {

	/** @var string セキュリティポリシーID */
	private $securityPolicyId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string セキュリティポリシー名 */
	private $name;

	/** @var string ポリシードキュメント */
	private $policy;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * セキュリティポリシーIDを取得
	 *
	 * @return string セキュリティポリシーID
	 */
	public function getSecurityPolicyId() {
		return $this->securityPolicyId;
	}

	/**
	 * セキュリティポリシーIDを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーID
	 */
	public function setSecurityPolicyId($securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}

	/**
	 * セキュリティポリシーIDを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーID
	 * @return self
	 */
	public function withSecurityPolicyId($securityPolicyId): self {
		$this->setSecurityPolicyId($securityPolicyId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * セキュリティポリシー名を取得
	 *
	 * @return string セキュリティポリシー名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * セキュリティポリシー名を設定
	 *
	 * @param string $name セキュリティポリシー名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * セキュリティポリシー名を設定
	 *
	 * @param string $name セキュリティポリシー名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * ポリシードキュメントを取得
	 *
	 * @return string ポリシードキュメント
	 */
	public function getPolicy() {
		return $this->policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string $policy ポリシードキュメント
	 */
	public function setPolicy($policy) {
		$this->policy = $policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string $policy ポリシードキュメント
	 * @return self
	 */
	public function withPolicy($policy): self {
		$this->setPolicy($policy);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return SecurityPolicy
	 */
    static function build(array $array)
    {
        $item = new SecurityPolicy();
        $item->setSecurityPolicyId(isset($array['securityPolicyId']) ? $array['securityPolicyId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setPolicy(isset($array['policy']) ? $array['policy'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}