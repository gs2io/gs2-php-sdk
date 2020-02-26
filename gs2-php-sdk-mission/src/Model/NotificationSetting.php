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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;

/**
 * プッシュ通知設定
 *
 * @author Game Server Services, Inc.
 *
 */
class NotificationSetting implements IModel {
	/**
     * @var string プッシュ通知に使用する GS2-Gateway のネームスペース のGRN
	 */
	protected $gatewayNamespaceId;

	/**
	 * プッシュ通知に使用する GS2-Gateway のネームスペース のGRNを取得
	 *
	 * @return string|null プッシュ通知に使用する GS2-Gateway のネームスペース のGRN
	 */
	public function getGatewayNamespaceId(): ?string {
		return $this->gatewayNamespaceId;
	}

	/**
	 * プッシュ通知に使用する GS2-Gateway のネームスペース のGRNを設定
	 *
	 * @param string|null $gatewayNamespaceId プッシュ通知に使用する GS2-Gateway のネームスペース のGRN
	 */
	public function setGatewayNamespaceId(?string $gatewayNamespaceId) {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
	}

	/**
	 * プッシュ通知に使用する GS2-Gateway のネームスペース のGRNを設定
	 *
	 * @param string|null $gatewayNamespaceId プッシュ通知に使用する GS2-Gateway のネームスペース のGRN
	 * @return NotificationSetting $this
	 */
	public function withGatewayNamespaceId(?string $gatewayNamespaceId): NotificationSetting {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
		return $this;
	}
	/**
     * @var bool モバイルプッシュ通知へ転送するか
	 */
	protected $enableTransferMobileNotification;

	/**
	 * モバイルプッシュ通知へ転送するかを取得
	 *
	 * @return bool|null モバイルプッシュ通知へ転送するか
	 */
	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}

	/**
	 * モバイルプッシュ通知へ転送するかを設定
	 *
	 * @param bool|null $enableTransferMobileNotification モバイルプッシュ通知へ転送するか
	 */
	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}

	/**
	 * モバイルプッシュ通知へ転送するかを設定
	 *
	 * @param bool|null $enableTransferMobileNotification モバイルプッシュ通知へ転送するか
	 * @return NotificationSetting $this
	 */
	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): NotificationSetting {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}
	/**
     * @var string モバイルプッシュ通知で使用するサウンドファイル名
	 */
	protected $sound;

	/**
	 * モバイルプッシュ通知で使用するサウンドファイル名を取得
	 *
	 * @return string|null モバイルプッシュ通知で使用するサウンドファイル名
	 */
	public function getSound(): ?string {
		return $this->sound;
	}

	/**
	 * モバイルプッシュ通知で使用するサウンドファイル名を設定
	 *
	 * @param string|null $sound モバイルプッシュ通知で使用するサウンドファイル名
	 */
	public function setSound(?string $sound) {
		$this->sound = $sound;
	}

	/**
	 * モバイルプッシュ通知で使用するサウンドファイル名を設定
	 *
	 * @param string|null $sound モバイルプッシュ通知で使用するサウンドファイル名
	 * @return NotificationSetting $this
	 */
	public function withSound(?string $sound): NotificationSetting {
		$this->sound = $sound;
		return $this;
	}

    public function toJson(): array {
        return array(
            "gatewayNamespaceId" => $this->gatewayNamespaceId,
            "enableTransferMobileNotification" => $this->enableTransferMobileNotification,
            "sound" => $this->sound,
        );
    }

    public static function fromJson(array $data): NotificationSetting {
        $model = new NotificationSetting();
        $model->setGatewayNamespaceId(isset($data["gatewayNamespaceId"]) ? $data["gatewayNamespaceId"] : null);
        $model->setEnableTransferMobileNotification(isset($data["enableTransferMobileNotification"]) ? $data["enableTransferMobileNotification"] : null);
        $model->setSound(isset($data["sound"]) ? $data["sound"] : null);
        return $model;
    }
}