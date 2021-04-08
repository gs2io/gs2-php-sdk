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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;

/**
 * 購読
 *
 * @author Game Server Services, Inc.
 *
 */
class NotificationType implements IModel {
	/**
     * @var int 新着メッセージ通知を受け取るカテゴリ
	 */
	protected $category;

	/**
	 * 新着メッセージ通知を受け取るカテゴリを取得
	 *
	 * @return int|null 新着メッセージ通知を受け取るカテゴリ
	 */
	public function getCategory(): ?int {
		return $this->category;
	}

	/**
	 * 新着メッセージ通知を受け取るカテゴリを設定
	 *
	 * @param int|null $category 新着メッセージ通知を受け取るカテゴリ
	 */
	public function setCategory(?int $category) {
		$this->category = $category;
	}

	/**
	 * 新着メッセージ通知を受け取るカテゴリを設定
	 *
	 * @param int|null $category 新着メッセージ通知を受け取るカテゴリ
	 * @return NotificationType $this
	 */
	public function withCategory(?int $category): NotificationType {
		$this->category = $category;
		return $this;
	}
	/**
     * @var bool オフラインだった時にモバイルプッシュ通知に転送するか
	 */
	protected $enableTransferMobilePushNotification;

	/**
	 * オフラインだった時にモバイルプッシュ通知に転送するかを取得
	 *
	 * @return bool|null オフラインだった時にモバイルプッシュ通知に転送するか
	 */
	public function getEnableTransferMobilePushNotification(): ?bool {
		return $this->enableTransferMobilePushNotification;
	}

	/**
	 * オフラインだった時にモバイルプッシュ通知に転送するかを設定
	 *
	 * @param bool|null $enableTransferMobilePushNotification オフラインだった時にモバイルプッシュ通知に転送するか
	 */
	public function setEnableTransferMobilePushNotification(?bool $enableTransferMobilePushNotification) {
		$this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
	}

	/**
	 * オフラインだった時にモバイルプッシュ通知に転送するかを設定
	 *
	 * @param bool|null $enableTransferMobilePushNotification オフラインだった時にモバイルプッシュ通知に転送するか
	 * @return NotificationType $this
	 */
	public function withEnableTransferMobilePushNotification(?bool $enableTransferMobilePushNotification): NotificationType {
		$this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
		return $this;
	}

    public function toJson(): array {
        return array(
            "category" => $this->category,
            "enableTransferMobilePushNotification" => $this->enableTransferMobilePushNotification,
        );
    }

    public static function fromJson(array $data): NotificationType {
        $model = new NotificationType();
        $model->setCategory(isset($data["category"]) ? $data["category"] : null);
        $model->setEnableTransferMobilePushNotification(isset($data["enableTransferMobilePushNotification"]) ? $data["enableTransferMobilePushNotification"] : null);
        return $model;
    }
}