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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;

/**
 * GS2アカウント
 *
 * @author Game Server Services, Inc.
 *
 */
class Account implements IModel {
	/**
     * @var string GS2アカウント
	 */
	protected $accountId;

	/**
	 * GS2アカウントを取得
	 *
	 * @return string|null GS2アカウント
	 */
	public function getAccountId(): ?string {
		return $this->accountId;
	}

	/**
	 * GS2アカウントを設定
	 *
	 * @param string|null $accountId GS2アカウント
	 */
	public function setAccountId(?string $accountId) {
		$this->accountId = $accountId;
	}

	/**
	 * GS2アカウントを設定
	 *
	 * @param string|null $accountId GS2アカウント
	 * @return Account $this
	 */
	public function withAccountId(?string $accountId): Account {
		$this->accountId = $accountId;
		return $this;
	}
	/**
     * @var string None
	 */
	protected $ownerId;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $ownerId None
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $ownerId None
	 * @return Account $this
	 */
	public function withOwnerId(?string $ownerId): Account {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string GS2アカウントの名前
	 */
	protected $name;

	/**
	 * GS2アカウントの名前を取得
	 *
	 * @return string|null GS2アカウントの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $name GS2アカウントの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $name GS2アカウントの名前
	 * @return Account $this
	 */
	public function withName(?string $name): Account {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string メールアドレス
	 */
	protected $email;

	/**
	 * メールアドレスを取得
	 *
	 * @return string|null メールアドレス
	 */
	public function getEmail(): ?string {
		return $this->email;
	}

	/**
	 * メールアドレスを設定
	 *
	 * @param string|null $email メールアドレス
	 */
	public function setEmail(?string $email) {
		$this->email = $email;
	}

	/**
	 * メールアドレスを設定
	 *
	 * @param string|null $email メールアドレス
	 * @return Account $this
	 */
	public function withEmail(?string $email): Account {
		$this->email = $email;
		return $this;
	}
	/**
     * @var string フルネーム
	 */
	protected $fullName;

	/**
	 * フルネームを取得
	 *
	 * @return string|null フルネーム
	 */
	public function getFullName(): ?string {
		return $this->fullName;
	}

	/**
	 * フルネームを設定
	 *
	 * @param string|null $fullName フルネーム
	 */
	public function setFullName(?string $fullName) {
		$this->fullName = $fullName;
	}

	/**
	 * フルネームを設定
	 *
	 * @param string|null $fullName フルネーム
	 * @return Account $this
	 */
	public function withFullName(?string $fullName): Account {
		$this->fullName = $fullName;
		return $this;
	}
	/**
     * @var string 会社名
	 */
	protected $companyName;

	/**
	 * 会社名を取得
	 *
	 * @return string|null 会社名
	 */
	public function getCompanyName(): ?string {
		return $this->companyName;
	}

	/**
	 * 会社名を設定
	 *
	 * @param string|null $companyName 会社名
	 */
	public function setCompanyName(?string $companyName) {
		$this->companyName = $companyName;
	}

	/**
	 * 会社名を設定
	 *
	 * @param string|null $companyName 会社名
	 * @return Account $this
	 */
	public function withCompanyName(?string $companyName): Account {
		$this->companyName = $companyName;
		return $this;
	}
	/**
     * @var string パスワード
	 */
	protected $password;

	/**
	 * パスワードを取得
	 *
	 * @return string|null パスワード
	 */
	public function getPassword(): ?string {
		return $this->password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 */
	public function setPassword(?string $password) {
		$this->password = $password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 * @return Account $this
	 */
	public function withPassword(?string $password): Account {
		$this->password = $password;
		return $this;
	}
	/**
     * @var string ステータス
	 */
	protected $status;

	/**
	 * ステータスを取得
	 *
	 * @return string|null ステータス
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string|null $status ステータス
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string|null $status ステータス
	 * @return Account $this
	 */
	public function withStatus(?string $status): Account {
		$this->status = $status;
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
	 * @return Account $this
	 */
	public function withCreatedAt(?int $createdAt): Account {
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
	 * @return Account $this
	 */
	public function withUpdatedAt(?int $updatedAt): Account {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "accountId" => $this->accountId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "email" => $this->email,
            "fullName" => $this->fullName,
            "companyName" => $this->companyName,
            "password" => $this->password,
            "status" => $this->status,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Account {
        $model = new Account();
        $model->setAccountId(isset($data["accountId"]) ? $data["accountId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setEmail(isset($data["email"]) ? $data["email"] : null);
        $model->setFullName(isset($data["fullName"]) ? $data["fullName"] : null);
        $model->setCompanyName(isset($data["companyName"]) ? $data["companyName"] : null);
        $model->setPassword(isset($data["password"]) ? $data["password"] : null);
        $model->setStatus(isset($data["status"]) ? $data["status"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}