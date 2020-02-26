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
 * 割り当てられたセキュリティポリシー
 *
 * @author Game Server Services, Inc.
 *
 */
class AttachSecurityPolicy implements IModel {
	/**
     * @var string ユーザ のGRN
	 */
	protected $userId;

	/**
	 * ユーザ のGRNを取得
	 *
	 * @return string|null ユーザ のGRN
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザ のGRNを設定
	 *
	 * @param string|null $userId ユーザ のGRN
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザ のGRNを設定
	 *
	 * @param string|null $userId ユーザ のGRN
	 * @return AttachSecurityPolicy $this
	 */
	public function withUserId(?string $userId): AttachSecurityPolicy {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] セキュリティポリシー のGRNのリスト
	 */
	protected $securityPolicyIds;

	/**
	 * セキュリティポリシー のGRNのリストを取得
	 *
	 * @return string[]|null セキュリティポリシー のGRNのリスト
	 */
	public function getSecurityPolicyIds(): ?array {
		return $this->securityPolicyIds;
	}

	/**
	 * セキュリティポリシー のGRNのリストを設定
	 *
	 * @param string[]|null $securityPolicyIds セキュリティポリシー のGRNのリスト
	 */
	public function setSecurityPolicyIds(?array $securityPolicyIds) {
		$this->securityPolicyIds = $securityPolicyIds;
	}

	/**
	 * セキュリティポリシー のGRNのリストを設定
	 *
	 * @param string[]|null $securityPolicyIds セキュリティポリシー のGRNのリスト
	 * @return AttachSecurityPolicy $this
	 */
	public function withSecurityPolicyIds(?array $securityPolicyIds): AttachSecurityPolicy {
		$this->securityPolicyIds = $securityPolicyIds;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $attachedAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getAttachedAt(): ?int {
		return $this->attachedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $attachedAt 作成日時
	 */
	public function setAttachedAt(?int $attachedAt) {
		$this->attachedAt = $attachedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $attachedAt 作成日時
	 * @return AttachSecurityPolicy $this
	 */
	public function withAttachedAt(?int $attachedAt): AttachSecurityPolicy {
		$this->attachedAt = $attachedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "securityPolicyIds" => $this->securityPolicyIds,
            "attachedAt" => $this->attachedAt,
        );
    }

    public static function fromJson(array $data): AttachSecurityPolicy {
        $model = new AttachSecurityPolicy();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setSecurityPolicyIds(isset($data["securityPolicyIds"]) ? $data["securityPolicyIds"] : null);
        $model->setAttachedAt(isset($data["attachedAt"]) ? $data["attachedAt"] : null);
        return $model;
    }
}